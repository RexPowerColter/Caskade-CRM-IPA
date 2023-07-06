// This function runs when the document is fully loaded.
$(document).ready(function () {

    // This attaches a keyup event listener to all elements with the class "client-autocomplete".
    $(".client-autocomplete")
        .on("keyup", function (event) {
            // If the input field is empty, remove the corresponding client ID.
            if (this.value == "") {
                console.log("removing...");
                $(this).parent().find(".client_ids").closest(".client_ids").html("");
            }
        })

        // This enables the jQuery UI Autocomplete feature on all elements with the class "client-autocomplete".
        .autocomplete({
            // This function specifies the data source for the Autocomplete feature.
            source: function (request, response) {
                // Send an AJAX request to retrieve a list of clients matching the search term.
                $.ajax({
                    url: "/api/clients/" + request.term,
                    dataType: "json",
                    success: response,
                    error: function () {
                        // If there's an error, return an empty list.
                        response([]);
                    }
                });
            },
            // This specifies the minimum number of characters required to trigger the Autocomplete feature.
            minLength: 2,

            // This function runs when a client is selected from the Autocomplete suggestions.
            select: function (event, ui) {
                // Insert a hidden input field containing the selected client's ID.
                $(this).parent().find(".client_ids").closest(".client_ids").html("<input name='clients[]' type='hidden' value='" + ui.item.id + "' >");
            }
        });

    // This enables the "Chosen" plugin on all elements with the class "chosen-select".
    $(".chosen-select").chosen({ width: "95%" });
});