      <footer id="mainFooter">

      </footer>
    </main>

    <input type="hidden" id="gAPI" value="<?= get_g_field('google_calendar_api_key') ?>">
    <input type="hidden" id="clientID" value="<?= get_g_field('oauth_id') ?>">
    <input type="hidden" id="home_url" value="<?= get_home_url(); ?>">
    <input type="hidden" id="assets_url" value="<?= WPB5_ASSETS ?>">
    <input type="hidden" id="ajax_url" value="<?= admin_url( 'admin-ajax.php' ) ?>">
    <?php wp_footer(); ?>
    <?php if(is_author()): ?>
    <script type="text/javascript">
      // Client ID and API key from the Developer Console
      var CLIENT_ID = '<?= get_g_field('oauth_id') ?>';
      var API_KEY = '<?= get_g_field('google_calendar_api_key') ?>';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/calendar.readonly";

      var authorizeButton = document.getElementById('openAuthO');
      var signoutButton = document.getElementById('closeAuthO');

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        gapi.load('client:auth2', initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
          signoutButton.onclick = handleSignoutClick;
        }, function(error) {
          appendPre(JSON.stringify(error, null, 2));
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
          authorizeButton.style.display = 'none';
          signoutButton.style.display = 'block';
          listUpcomingEvents();
        } else {
          authorizeButton.style.display = 'block';
          signoutButton.style.display = 'none';
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
        document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue="+jQuery('#home_url').val();
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

      /**
       * Print the summary and start datetime/date of the next ten events in
       * the authorized user's calendar. If no events are found an
       * appropriate message is printed.
       */
      function listUpcomingEvents() {
        var today_start = new Date();
        today_start.setHours(0,0,0,0);
        var today_end = new Date();
        today_end.setHours(24,0,0,0);

        //console.log('start_at: '+(today_start).toISOString());
        //console.log('end_at: '+(today_end).toISOString());
        gapi.client.calendar.events.list({
          'calendarId': 'primary',
          'timeMin': (today_start).toISOString(),
          'timeMax': (today_end).toISOString(),
          'showDeleted': false,
          'singleEvents': true,
          'maxResults': 10,
          'orderBy': 'startTime'
        }).then(function(response) {
          var events = response.result.items;
          //appendPre('Upcoming events:');
          replaceFlag = jQuery('#dateFlag').val();
          var notStart = parseInt(jQuery('#workStart').val());
          var notEnd = parseInt(jQuery('#workEnd').val());

          if (events.length > 0) {
            for (i = 0; i < events.length; i++) {
              var event = events[i];
              var when = event.start.dateTime;
              var whenEnd = event.end.dateTime;
              startTime = when.replace(replaceFlag,'');
              replacedFlag = startTime.split(':00-');

              eventStart = replacedFlag[0].split(':');
              eventStart  = (+eventStart[0]) * 60 * 60 + (+eventStart[1]) * 60;

              endTime = whenEnd.replace(replaceFlag,'');
              replacedFlag = endTime.split(':00-');

              eventEnd = replacedFlag[1].split(':');
              eventEnd  = (+eventEnd[0]) * 60 * 60 + (+eventEnd[1]) * 60;

              if((eventStart >= notStart && eventStart<= notEnd) || (eventEnd > notStart && eventEnd < notEnd)){
                // console.log(eventStart +' '+notStart);
                // console.log(eventStart +' '+notEnd);
                // console.log('not-show');
                jQuery('#notAvailableEvents').append('<li>-'+event.summary +'('+startTime+'-'+endTime+')</li>');
              }else{
                // console.log(eventStart +' '+notStart);
                // console.log(eventStart +' '+notEnd);
                // console.log('show');
                jQuery('#availableEvents').append('<li>-'+event.summary +'('+startTime+'-'+endTime+')</li>');
              }
              if (!when) {

                when = event.start.date;
              }

              //appendPre(event.summary + ' (' + when + ') - ('+whenEnd+')')
            }
          } else {
            appendPre('No upcoming events found.');
          }
        });
      }

    </script>

    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
  <?php endif; ?>
  </body>
</html>
