console.log('here');
self.addEventListener('push', function (e) {
    console.log('good');
    console.log(e);
    if (e.data != null) {
        var msg = e.data.json();
        console.log('message'); 
        console.log(msg);
        self.registration.showNotification(msg.title, {
            body: msg.body,
            icon: msg.icon,
            actions: msg.actions
        });
    }
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        //notifications aren't supported or permission not granted!
        return;
    }
    // console.log(e.data);
    if (e.data) {
        var msg = e.data.json();
        console.log('message'); 
        console.log(msg)
        e.waitUntil(self.registration.showNotification(msg.title, {
            body: msg.body,
            icon: msg.icon,
            actions: msg.actions
        }));
    }
});