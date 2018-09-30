(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

// window._ = require('lodash');
var notifications = [];
var totNotifications = 0;

var NOTIFICATION_TYPES = {
    permissions: 'App\\Notifications\\NewPermission'
};

$(document).ready(function () {
    // check if there's a logged in user
    if (Laravel.userId) {
        $.get('/' + Laravel.adminRoute + '/notifications', function (data) {
            showNotifications(data, "#notifications");
            totNotifications = data.length;
        });
        setInterval(function () {
            $.get('/' + Laravel.adminRoute + '/notifications', function (data) {
                addNotifications(data, "#notifications");
            });
        }, 10000);
    }
});

function addNotifications(newNotifications, target) {
    notifications = newNotifications;
    if (notifications.length > totNotifications) {
        var totNew = notifications.length - totNotifications;
        totNotifications = notifications.length;

        (function ($) {
            $('body').pgNotification({
                style: 'circle',
                title: 'Notifications',
                message: "You have " + totNew + " new notifications",
                position: "top-right",
                timeout: 10000,
                type: "success",
                thumbnail: '<img width="40" height="40" style="display: inline-block;" src="' + Laravel.imageNoti + '" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'
            }).show();
        })(window.jQuery);
    }
    showNotifications(notifications, target);
}

function showNotifications(notifications, target) {
    if (notifications.length) {
        var htmlElements = notifications.map(function (notification) {
            return makeNotification(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications');
        $(target + 'Count').html(notifications.length).removeClass('hidden');
        $(target + 'Count2').html(notifications.length);
    } else {
        $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
        $(target).removeClass('has-notifications');
        $(target + 'Count').addClass('hidden');
        $(target + 'Count2').html(0);
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
    if (notification.data.icon) {
        icon = notification.data.icon;
    } else {
        icon = 'info-circle';
    }
    return icon;
}

},{}]},{},[1]);

//# sourceMappingURL=app.js.map
