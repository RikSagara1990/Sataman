   function handleFileSelect(evt) {
      var file = evt.target.files;// Список объектов
      var f = file[0];
      // Обрабатывать только файлы изображений..
      if (!f.type.match('image.*')) {
         alert("Загружайте только 'png,jpg,jpeg,gif' файлы пожалуйста!");
      }
      var reader = new FileReader();  //загружает в переменную файл
      // Закрытие для захвата информации о файле.
         reader.onload = (function(theFile) {   //обработчик события
            return function(e) {
               // Отрисовка миниатюр.
               var img=document.getElementById("imagefood");
               img.src=e.target.result;
            };
      })(f);
      // Чтение в файле изображения в виде URL-адреса данных.
      reader.readAsDataURL(f);
   }