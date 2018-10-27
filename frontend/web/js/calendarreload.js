jQuery(document).ready(function ($) {
    $('#startDate').datepicker({
        minDate: new Date(),
        minutesStep:false,

        onRenderCell: function (date, cellType) {
            var currentDate = date.getDate();
            var d, m, y, dater;

            var start11 = ["2018-10-27 02:49","2018-10-28 02:49"];
            var end22 =2;

            for (i = 0; i < end22; i++) {
                dater = new Date(start11[i]);

                d = dater.getDate(),
                    m = dater.getMonth(),
                    y = dater.getFullYear();

                if (cellType == 'day' && date.getFullYear() == y && date.getDate() == d && date.getMonth() == m) {
                    return {
                        html: currentDate + '<span class="dp-note"></span>',
                        disabled: 'true'
                    }
                }
            }

        }
    })


    $('#finishDate').datepicker({
        minDate: new Date(),


        onRenderCell: function (date, cellType) {
            var currentDate = date.getDate();
            var d, m, y, dater;

            var start11 = ["2018-10-28","2018-10-29"];
            var end22 =2;

            for (j = 0; j < end22; j++) {
                dater = new Date(start11[j]);

                d = dater.getDate(),
                    m = dater.getMonth(),
                    y = dater.getFullYear();

                if (cellType == 'day' && date.getFullYear() == y && date.getDate() == d && date.getMonth() == m) {
                    return {
                        html: currentDate + '<span class="dp-note"></span>',
                        disabled: 'true'
                    }
                }
            }

        }
    })

});
