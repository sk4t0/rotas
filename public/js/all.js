window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
var notifications = [];

const NOTIFICATION_TYPES = {
    permissions: 'App\\Notifications\\NewPermission'
};

$(document).ready(function() {
    // check if there's a logged in user
    if(Laravel.userId) {
        $.get('/' + Laravel.adminRoute + '/notifications', function (data) {
            addNotifications(data, "#notifications");
        });
    }
});

function addNotifications(newNotifications, target) {
    notifications = _.concat(notifications, newNotifications);
    showNotifications(notifications, target);
}


function showNotifications(notifications, target) {
    if(notifications.length) {
        var htmlElements = notifications.map(function (notification) {
            return makeNotification(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications');
        $(target + 'Count').text(notifications.length).show();
    } else {
        $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
        $(target).removeClass('has-notifications');
        $(target + 'Count').hide();
    }
}

// Make a single notification string
function makeNotification(notification) {
    var to = routeNotification(notification);
    var notificationText = makeNotificationText(notification);
    var icon = makeNotificationIcon(notification);
    return '<li><a href="' + to + '"><i class="fa fa-' + icon + ' text-aqua"></i>' + notificationText + '</a></li>';
}

// get the notification route based on it's type
function routeNotification(notification) {
    var to = notification.data.action + '?read=' + notification.id;
    return to;
}

// get the notification text based on it's type
function makeNotificationText(notification) {
    var text = notification.data.message;
    return text;
}

// get the notification text based on it's type
function makeNotificationIcon(notification) {
    var icon = '';
    if(notification.data.icon){
        icon = notification.data.icon;
    } else {
        icon = 'info-circle';
    }
    return icon;
}
//# sourceMappingURL=all.js.map
