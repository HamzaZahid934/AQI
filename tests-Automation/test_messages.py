import time
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

BASE_URL = "http://127.0.0.1:8000/"

def test_messages_tab_and_save(browser):
    browser.get(BASE_URL)
    time.sleep(2)

    # Click on Messages tab/button
    messages_btn = browser.find_element(By.XPATH, "//button[normalize-space()='Messages']")
    messages_btn.click()
    time.sleep(1)

    # Fill one field (example)
    good_input = browser.find_element(By.XPATH, "//input[@placeholder='Good (0-50)']")
    good_input.clear()
    good_input.send_keys("Air quality is good!")

    save_btn = browser.find_element(By.XPATH, "//button[normalize-space()='Save Messages']")
    save_btn.click()
    time.sleep(1)

    # Verify that save was successful by checking the success message
    success_div = WebDriverWait(browser, 10).until(
        EC.presence_of_element_located((By.XPATH, "//div[contains(@class, 'border-green-200') and contains(text(), 'Custom messages saved successfully!')]"))
    )
    assert success_div is not None
