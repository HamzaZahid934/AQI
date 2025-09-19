import time
import os
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

BASE_URL = "http://127.0.0.1:8000/"

def test_csv_upload(browser):
    browser.get(BASE_URL)
    time.sleep(2)

    upload_input = browser.find_element(By.CSS_SELECTOR, "input[type='file']")
    # Make the input visible for send_keys
    browser.execute_script("arguments[0].style.display = 'block';", upload_input)
    # path to CSV sample
    csv_path = os.path.abspath(os.path.join(os.path.dirname(__file__), "data/sample_aqi.csv"))
    upload_input.send_keys(csv_path)

    process_btn = browser.find_element(By.XPATH, "//button[normalize-space()='Process']")
    process_btn.click()
    time.sleep(1)

    # Wait for the table to appear with rows
    WebDriverWait(browser, 10).until(
        EC.presence_of_element_located((By.XPATH, "//table//tbody//tr"))
    )

    # Check table rows appear (header + data rows)
    rows = browser.find_elements(By.XPATH, "//table//tr")
    assert len(rows) > 1, "Uploaded CSV didn’t produce rows in table"
