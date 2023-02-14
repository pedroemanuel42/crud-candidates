$(document).ready(function () {
    $("#state").on("change", function () {
        const selectedState = $(this).val();

        $.ajax({
            url: "/get-cities",
            type: "GET",
            dataType: "json",
            success: function (cities) {
                $("#city").empty();
                $("#city").append(
                    '<option value="">Select the city</option>'
                );

                $.each(cities, function (key, city) {
                    if (selectedState == city.state) {
                        $("#city").append(
                            `<option value="${city.name}">${city.name}</option>`
                        );
                    }
                });
            },
        });
    });
});
