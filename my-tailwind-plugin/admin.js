jQuery(document).ready(function ($) {
    $.ajax({
        url: MyTailwindPlugin.ajax_url,
        method: 'POST',
        data: {
            action: 'my_tailwind_plugin_fetch_data'
        },
        success: function (response) {
            if (response.success) {
                var data = response.data;
                var table = '<table class="table-auto w-full border-collapse border border-gray-300">';
                table += '<thead>';
                table += '<tr class="bg-gray-200 text-gray-700">';
                table += '<th class="border border-gray-300 px-4 py-2">ID</th>';
                table += '<th class="border border-gray-300 px-4 py-2">Name</th>';
                table += '<th class="border border-gray-300 px-4 py-2">Role</th>';
                table += '<th class="border border-gray-300 px-4 py-2">Email</th>';
                table += '</tr>';
                table += '</thead>';
                table += '<tbody>';
                data.forEach(function (item) {
                    table += '<tr>';
                    table += '<td class="border border-gray-300 px-4 py-2 text-gray-800">' + item.id + '</td>';
                    table += '<td class="border border-gray-300 px-4 py-2 text-gray-800">' + item.name + '</td>';
                    table += '<td class="border border-gray-300 px-4 py-2 text-gray-800">' + item.role + '</td>';
                    table += '<td class="border border-gray-300 px-4 py-2 text-gray-800">' + item.email + '</td>';
                    table += '</tr>';
                });
                table += '</tbody>';
                table += '</table>';
                $('#my-tailwind-plugin-listing').html(table);
            } else {
                $('#my-tailwind-plugin-listing').html('<p class="text-red-500">Error fetching data.</p>');
            }
        }
    });
});
