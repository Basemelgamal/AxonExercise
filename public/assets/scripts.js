var currentPage = 1;

function fetchData(page, state = null, country = null){
    state = $('#valid_selection').val();
    country = $('#country_selection').val();
    console.log('current page: '+page, 'state: '+state, 'country: '+ country);
    $.ajax({
        url: '/phone_numbers',
        type: 'GET',
        data: {page: page, state: state, country: country},
        success: function (data) {
            updateTable(data.data);
        }
    });
}

function updateTable(data) {
    var tableBody = $('#phone_numbers_table_rows');
    tableBody.empty();
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

function valid_numbers(){
    fetchData(currentPage);
}

function country_numbers(){
    fetchData(currentPage);
}
