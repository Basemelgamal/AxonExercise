var currentPage = 1;

function fetchData(page){
    console.log('current page: '+page);
    $.ajax({
        url: '/phone_numbers',
        type: 'GET',
        data: { page: page },
        success: function (data) {
            if(data.data.length > 0){
                updateTable(data.data);
            }
        }
    });
}

function updateTable(data) {
    var tableBody = $('#phone_numbers_table_rows');
    tableBody.empty();
    console.log(data);
    data.forEach(function (v ,i) {
        var newRow = createRow(v);
        tableBody.append(newRow);
    });
}


function createRow(rowData) {
    var newRow = '<tr>' +
        '<td>' + rowData.id + '</td>' +
        '<td>' + rowData.country + '</td>' +
        '<td>' + rowData.state + '</td>' +
        '<td>' + rowData.country_code + '</td>' +
        '<td>' + rowData.phone + '</td>' +
        '</tr>';
    return newRow;
}

fetchData(currentPage);


function nextPage(){
    currentPage++;
    fetchData(currentPage);
    $('#currentPage').text(currentPage);
}

function prevPage(){
    if (currentPage > 1) {
        currentPage--;
        fetchData(currentPage);
        $('#currentPage').text(currentPage);
    }
}

