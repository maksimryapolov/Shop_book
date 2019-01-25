$(document).ready(function() {

    let addedClass, // глобальный класс CSS  добавления или переключения
        classNameAdd = ["commentLikeActive",  "commentDislikeActive"],  // классы CSS добавления active
        resultClass = 1;

    $(".rating").on('click', function() {
            let rating = $(".rating"),
            baseClass = $(this).attr("class").split(" ")[0]; // базавый класс CSS

        let checkElem = checkClass(rating, classNameAdd, function (elem) {
            let result = false;
            for(let i = 0; i < classNameAdd.length; i++) {
                if(elem.classList.contains(classNameAdd[i])) {
                    result = elem;
                    break;
                }
            }
            return result;
        });

        addedClass = checkBaseClass(baseClass, classNameAdd);

        // если нет установленного класса, то ставим active на этот класс
        if(!checkElem) {
            $(this).addClass(addedClass);
        // иначе проверка если есть такой класс у элемента, то убираем его
        } else {
            if($(this).hasClass(checkElem.classList[0])){
                $(this).toggleClass(addedClass);
                // иначе переключаем на другой
            } else {
                let elemDel = theRemoteClass(rating,baseClass);
                elemDel.classList.remove(elemDel.classList[2]);
                $(this).addClass(checkBaseClass(baseClass, classNameAdd));
            }
        }

    });
    // возвращает класс который надо удалить при переключении 
   function theRemoteClass (baseClass, add) {
        for(let i = 0; i < baseClass.length; i++) {
            if(!baseClass[i].classList.contains(add)) {
                return baseClass[i];
            }
        }
   }

   // возвращает класс который необходимо добавить при переключении  
    function checkBaseClass(baseClass, classNameAdd) {
        let addedClass;
        classNameAdd.forEach((item) => {
            let pattern = new RegExp(baseClass, "i");
            if(pattern.test(item)) {
                addedClass = item;
            }
        });
        return addedClass;
    }

    // устанавливает какой класс CSS active
     function checkClass(className, classNameAdd, funcHelp) {
         let result;
                for(let i = 0; i < className.length; i++) {
                    result = funcHelp(className[i]);
                    if(result) {
                        return result;
                    }
                }
                return false;
        }

            $(".btn").on("mousedown", function () {
                for(let i = 0; i < classNameAdd.length; i++ ) {
                    if($("."+classNameAdd[i]).attr("data-id")) {
                        resultClass = +$("."+classNameAdd[i]).attr("data-id");
                        break;
                    } else {
                        resultClass = 1;
                    }
                }
                let ins = $(`<input type='checkbox'  name='rating' value="${resultClass}" checked>`);

                $("#ratingBlock").html(ins);
            })

}); 