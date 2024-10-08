$(document).ready(function () {
    const technicalDifficultiesMessage =
        '<p>It seems we are having some technical difficulties. Please try again in a couple of minutes.</p><p>If the issue persists, please contact the website owner at <a href="mailto:ernstvermeulen@proton.me">ernstvermeulen@proton.me</a></p>';

    $.ajax({
        url: "/rates",
        method: "GET",
        success: function (currencies) {
            if (currencies.length === 0) {
                $("#features").replaceWith(technicalDifficultiesMessage);
                return;
            }

            currencies.forEach(function (currency) {
                $("select").append(
                    `<option value="${currency.code}">${currency.code}</option>`,
                );
                $("table tbody").append(
                    "<tr><td>USD_" +
                        currency.code +
                        "</td><td>" +
                        currency.rate +
                        "</td></tr>",
                );
            });
        },
        error: function (xhr, status, error) {
            $("#features").replaceWith(technicalDifficultiesMessage);
            console.error("Error fetching data from /rates endpoint.");
        },
    });

    $("form").on("submit", function (e) {
        e.preventDefault();
        const token = $('meta[name="csrf-token"]').attr("content");

        console.log(token);

        $.ajax({
            url: "/convert",
            method: "POST",
            data: $("form").serialize(),
            //headers: {
            //    "X-CSRF-TOKEN": token,
            //},
            success: function (baseAmount) {
                $("#result").html(
                    "<hr>The converted value is <mark>" +
                        baseAmount +
                        "</mark>",
                );
            },
            error: function (xhr, status, error) {
                $("#features").replaceWith(technicalDifficultiesMessage);
                console.error("Error calculating the currency value.");
            },
        });
    });
});
