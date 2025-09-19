import pytest
import os
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from webdriver_manager.chrome import ChromeDriverManager

@pytest.fixture(scope="session")
def browser():
    options = Options()
    options.add_argument("--headless=new")  # headless; remove if you want browser visible
    options.add_argument("--no-sandbox")
    options.add_argument("--disable-dev-shm-usage")

    # Configure download preferences
    options.add_experimental_option("prefs", {
        "download.default_directory": os.path.join(os.getcwd(), "tests-Automation", "downloads"),
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "profile.default_content_settings.popups": 0,
        "profile.default_content_setting_values.automatic_downloads": 1
    })

    driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=options)
    driver.maximize_window()
    yield driver
    driver.quit()
