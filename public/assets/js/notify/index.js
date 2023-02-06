'use strict';
var notify = $.notify('<i class="fa fa-database"></i><strong>Đang tải</strong> dữ liệu người dùng', {
    type: 'theme',
    allow_dismiss: true,
    delay: 3000,
    showProgressbar: true,
    timer: 300
});

setTimeout(function() {
    notify.update('message', '<i class="fa fa-cogs"></i><strong>Đang tải</strong> dữ liệu bài hát.');
}, 1000);

setTimeout(function() {
    notify.update('message', '<i class="fa fa-bell-o"></i><strong>Cập nhật </strong> dữ liệu.');
}, 2000);
