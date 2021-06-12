// скрипт сортироваки заявок

function sortAll() {
    document.getElementById('sort_all').style.display = 'flex';
    document.getElementById('sort_new').style.display = 'none';
    document.getElementById('sort_process').style.display = 'none';
    document.getElementById('sort_done').style.display = 'none';
}

function sortNew() {
    document.getElementById('sort_all').style.display = 'none';
    document.getElementById('sort_new').style.display = 'flex';
    document.getElementById('sort_process').style.display = 'none';
    document.getElementById('sort_done').style.display = 'none';
}

function sortProcess() {
    document.getElementById('sort_all').style.display = 'none';
    document.getElementById('sort_new').style.display = 'none';
    document.getElementById('sort_process').style.display = 'flex';
    document.getElementById('sort_done').style.display = 'none';
}

function sortDone() {
    document.getElementById('sort_all').style.display = 'none';
    document.getElementById('sort_new').style.display = 'none';
    document.getElementById('sort_process').style.display = 'none';
    document.getElementById('sort_done').style.display = 'flex';
}