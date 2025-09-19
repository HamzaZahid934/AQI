import time
from selenium.webdriver.common.by import By

BASE_URL = "http://127.0.0.1:8000/"

def test_messages_tab_and_save(browser):
    browser.get(BASE_URL)
    time.sleep(2)

    # Click on Messages tab/button
    messages_btn = browser.find_element(By.XPATH, "//button[contains(text(),'Messages')]")
    messages_btn.click()
    time.sleep(1)

    # Fill one field (example)
    good_input = browser.find_element(By.XPATH, "//input[@name='good_message']")
    good_input.clear()
    good_input.send_keys("Air quality is good!")

    save_btn = browser.find_element(By.XPATH, "//button[contains(text(),'Save Messages')]")
    save_btn.click()
    time.sleep(1)

    # Verify that input retains the new value
    assert good_input.get_attribute("value") == "Air quality is good!"
