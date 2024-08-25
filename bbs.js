    

        const pass = document.querySelector('#password');
        const checkBox = document.querySelector('#check');
        checkBox.addEventListener('change', function(){
            if(this.checked) {
                pass.setAttribute('type', 'text');
            } else {
                pass.setAttribute('type', 'password');
            }
        });
    

    // $(document).ready(function(){

    //     $('#check').on('change', function(){
    //         if(this.checked) {
    //             $('#password').attr('type', 'text');
    //         } else {
    //             $('#password').attr('type', 'password');
    //         }
    //     });
    // });

    
    
    const innerTitles = document.querySelectorAll('.inner-title');
   
        innerTitles.forEach((inner, i) => {
            inner.addEventListener('click', function(e) {
   
                clickHandler(e);

                function clickHandler(e) {
                     const _target = e.currentTarget;
                     const content = _target.nextElementSibling;
                    
                     content.classList.toggle('inview');               
                }  
            }, 500);
        });

    const changes = document.querySelectorAll('.open-close');
        innerTitles.forEach((inn, i) => {
            inn.addEventListener('click', () => {
                changes.forEach((change, index) => {
                    if(i == index) {
                        change.classList.toggle('active');
                    }  
                })
            })
        });
    

 // Homeボタンがクリックされたらページをリロード  //////////////////////////////////////
         
        const hometitle = document.querySelector('.home-title');
    
        hometitle.addEventListener('click', () => {
             window.location.href= './bbs.php';
        });


                
// jQueryの場合　///////////////////////////////////////////////////////

        // $('.inner-title').each(function() {

        //     $(this).click(function(e) {
        //         clickHandler(e);
        //     })
        // });
                // function clickHandler(e) {
                //     const _target = $(e.currentTarget);
                //     const content = _target.next();
                    
                //     if(content.hasClass('inview') === false) {
                //         content.addClass('inview');
                //     } else {
                //         content.removeClass('inview');
                //     }
                    

                //     const change = _target.find('.change');

                //     if(change.attr('src') === './button-minus.png') {

                //         change.attr('src', './button-plus.png')

                //     } else {

                //         change.attr('src', './button-minus.png')
                //     }   
                // }
        
// カテゴリーの選択　///////////////////////////////////////////////////////////
        $(document).ready(function() {
            
            const category = $('#fstCategory');

            category.change(valChange);

        
            function valChange() {
               
                const subCategory = $('#sec-category'); 
                const fstCategory = category.val();
                // const value = subCategory.val();
                const parameter = 'fstCategory=' + fstCategory;

                $.ajax({
                    url:'./bbs_category.php',
                    type: 'get',
                    dataType: 'json',
                    data: parameter,
                    cache: false,
                })
                .done(function(data) {
            
                    subCategory.empty();
                    
                    for(let i = 0; i < data.length; i++) {
                        const name = data[i]['name'];
                        const value = data[i]['value'];
                        // const name = data.name;
                        let option = $('<option>');
                    
                        option.text(name);
                        subCategory.append(option);
                        option.attr('value', value);
                    }  
                });
            }             
        });    
    
        let deteal = document.querySelector('.deteal');
        const adds = document.querySelectorAll('.add');  
        
                adds.forEach((add) => {
                    deteal = '';

            if(deteal !== '') {

                for(let i= 0; i < deteal.length; i++ ) {
                    add.innerHTML('<div class="deteal"></div>');
                } 
            }
        });
    

