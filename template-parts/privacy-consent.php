<section id="privacy-consent" class="privacy-consent" aria-label="Privacy Consent Popup">
  <div class="callout consent-callout">
    <div class="grid-container full">
      <div class="grid-x grid-padding-x grid-padding-y align-center-middle">
        <div class="cell large-auto text-center large-text-left consent-content">
          We use cookies and other tracking technologies to improve your browsing experience on our website, to show you personalized content and targeted ads, to analyze our website traffic, and to understand where our visitors are coming from. By browsing our website, you consent to our use of cookies and other tracking technologies.
        </div>
        <div class="cell large-shrink text-center consent-buttons">
          <button class="small button secondary" data-open="privacy-popup">Change My Preferences</button> <button class="small button">I agree</button>
        </div>
      </div>
    </div>
  </div>

  <div class="reveal privacy-popup large" id="privacy-popup" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <div class="grid-x grid-padding-x grid-padding-y">
      <div class="cell">
        <h2>Privacy Settings</h2>
      </div>
      <div class="cell large-4 xlarge-3">
        <ul class="vertical tabs" data-responsive-accordion-tabs="tabs medium-accordion large-tabs" id="privacy-tabs">
          <li class="tabs-title is-active"><a href="#information-panel" aria-selected="true">Information</a></li>
          <li class="tabs-title"><a href="#necessary-panel">Strictly Necessary Cookies</a></li>
          <li class="tabs-title"><a href="#functionality-panel">Functionality Cookies</a></li>
          <li class="tabs-title"><a href="#tracking-panel">Tracking &amp; Performance Cookies</a></li>
          <li class="tabs-title"><a href="#advertising-panel">Targeting &amp; Advertising Cookies</a></li>
        </ul>
      </div>
      <div class="cell large-8 xlarge-9 show-for-large">
        <div class="tabs-content" data-tabs-content="privacy-tabs">
          <div class="tabs-panel is-active" id="information-panel">
            <div>
              <h3>Your privacy is important to us</h3>

              <p>Cookies are very small text files that are stored on your computer when you visit a website. We use cookies for a variety of purposes and to enhance your online experience on our website (for example, to remember your account login details).</p>

              <p>You can change your preferences and decline certain types of cookies to be stored on your computer while browsing our website. You can also remove any cookies already stored on your computer, but keep in mind that deleting cookies may prevent you from using parts of our website.</p>
            </div>
          </div>

          <div class="tabs-panel" id="necessary-panel">
            <h3>Strictly Necessary Cookies</h3>
            <p>These cookies are essential to provide you with services available through our website and to enable you to use certain features of our website.</p>
            <p>Without these cookies, we cannot provide you certain services on our website.</p>
            <div class="switch">
              <input class="switch-input disabled" id="necessary-yes-no" type="checkbox" name="necessarySwitch" checked disabled>
              <label class="switch-paddle" for="necessary-yes-no">
                <span class="show-for-sr">Allow strictly necessary cookies?</span>
                <span class="switch-active" aria-hidden="true">Yes</span>
                <span class="switch-inactive" aria-hidden="true">No</span>
              </label>
            </div>
          </div>

          <div class="tabs-panel" id="functionality-panel">
            <h3>Functionality Cookies</h3>
            <p>These cookies are used to provide you with a more personalized experience on our website and to remember choices you make when you use our website.</p>
            <p>For example, we may use functionality cookies to remember your language preferences or remember your login details.</p>
            <div class="switch">
              <input class="switch-input" id="functionality-yes-no" type="checkbox" name="functionalitySwitch" checked>
              <label class="switch-paddle" for="functionality-yes-no">
                <span class="show-for-sr">Allow functionality cookies?</span>
                <span class="switch-active" aria-hidden="true">Yes</span>
                <span class="switch-inactive" aria-hidden="true">No</span>
              </label>
            </div>
          </div>

          <div class="tabs-panel" id="tracking-panel">
            <h3>Tracking &amp; Performance Cookies</h3>
            <p>These cookies are used to collect information to analyze the traffic traffic to our website and how visitors are using our website.</p>
            <p>For example, these cookies may track things such as how long you spend on the website or the pages you visit which helps us to understand how we can improve our website site for you.</p>
            <p>The information collected through these tracking and performance cookies do not identify any individual visitor.</p>
            <div class="switch">
              <input class="switch-input" id="tracking-yes-no" type="checkbox" name="trackingSwitch" checked>
              <label class="switch-paddle" for="tracking-yes-no">
                <span class="show-for-sr">Allow tracking &amp; performance cookies?</span>
                <span class="switch-active" aria-hidden="true">Yes</span>
                <span class="switch-inactive" aria-hidden="true">No</span>
              </label>
            </div>
          </div>

          <div class="tabs-panel" id="advertising-panel">
            <h3>Targeting &amp; Advertising Cookies</h3>
            <p>These cookies are used to show advertising that is likely to be of interest to you based on your browsing habits.</p>
            <p>These cookies, as served by our content and/or advertising providers, may combine information they collected from our website with other information they have independently collected relating to your web browser's activities across their network of websites.</p>
            <p>If you choose to remove or disable these targeting or advertising cookies, you will still see adverts but they may not be relevant to you.</p>
            <div class="switch">
              <input class="switch-input" id="advertising-yes-no" type="checkbox" name="advertisingSwitch" checked>
              <label class="switch-paddle" for="advertising-yes-no">
                <span class="show-for-sr">Allow targeting &amp; advertising cookies?</span>
                <span class="switch-active" aria-hidden="true">Yes</span>
                <span class="switch-inactive" aria-hidden="true">No</span>
              </label>
            </div>
          </div>

        </div>
      </div>
      <div class="cell text-center large-text-right">
        <input class="button" type="submit" value="Save Preferences" />
      </div>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>

</section>
