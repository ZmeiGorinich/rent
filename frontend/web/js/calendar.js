jQuery(document).ready(function ($) {

    $('#custom-cells').datepicker({
        onRenderCell: function (date, cellType) {
            var currentDate = date.getDate();
            var d, m, y, dater;


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

        },

        inline: true,
        minDate: new Date(),
        //maxDate: new Date(2018, 10, 30, 12, 30, 0)

    })

});
