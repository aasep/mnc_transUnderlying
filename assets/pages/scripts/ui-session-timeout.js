var SessionTimeout = function () {

    var handlesessionTimeout = function () {
        $.sessionTimeout({
            title: 'Session Timeout Notification',
            message: 'Your session is about to expire.',
           // keepAliveUrl: '../demo/timeout-keep-alive.php',
            redirUrl: 'logout',
            logoutUrl: 'logout',
            warnAfter: 1800000, //warn after 5 seconds  1800000 (30 menit)
            redirAfter: 1825000, //redirect after 1800 secons (30 menit 25 detik ) ,
            countdownMessage: 'Redirecting in {timer} seconds.',
            countdownBar: true
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handlesessionTimeout();
        }
    };

}();

jQuery(document).ready(function() {    
   SessionTimeout.init();
});