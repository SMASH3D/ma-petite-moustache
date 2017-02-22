// Saves options to chrome.storage.sync.
function save_options() {
  var appUrl = document.getElementById('appUrl').value;
  
  chrome.storage.sync.set({
    appUrl: appUrl
  }, function() {
    // Update status to let user know options were saved.
    var status = document.getElementById('status');
    status.textContent = 'Options saved.';
    setTimeout(function() {
      status.textContent = '';
    }, 750);
  });
}

// Restores select box and checkbox state using the preferences
// stored in chrome.storage.
function restore_options() {
  // Use default value
  chrome.storage.sync.get({
    appUrl: 'https://ma-petite-moustache.lxc/app.php/'
  }, function(items) {
    document.getElementById('appUrl').value = items.appUrl;
  });
}
document.addEventListener('DOMContentLoaded', restore_options);
document.getElementById('save').addEventListener('click',
    save_options);
