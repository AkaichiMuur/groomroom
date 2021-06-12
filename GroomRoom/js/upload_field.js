/* ПРОВЕРКА РАЗМЕРА КАРТИНКИ. 2Мб = 2097152 байт  */

var uploadField = document.getElementById("file");

uploadField.onchange = function() 
{
    if (this.files[0].size > 2097152)
    {
        alert("Загружаемый файл слишком большой. Максимальный размер файла 2Мб.");
        this.value = "";
    };
};