import time
import os
from selenium.webdriver.common.by import By

BASE_URL = "http://127.0.0.1:8000/"

def test_csv_upload(browser):
    browser.get(BASE_URL)
    time.sleep(2)

    upload_input = browser.find_element(By.CSS_SELECTOR, "input[type='file']")
    # path to CSV sample
    csv_path = os.path.abspath(os.path.join(os.path.dirname(__file__), "data/sample_aqi.csv"))
    upload_input.send_keys(csv_path)

    process_btn = browser.find_element(By.XPATH, "//button[contains(text(),'Process')]")
    process_btn.click()
    time.sleep(3)

    # Check table rows appear
    rows = browser.find_elements(By.XPATH, "//table//tr")
    assert len(rows) > 1, "Uploaded CSV didn’t produce rows in table"
