    let banner = document.querySelector('.slides');
    let items = document.querySelectorAll('.slides li');
    let indicators = document.querySelector('.indicators');

    function initBanner(){
        
        if(banner){
            items[0].classList.add('active');
            console.log('Banner iniciado com sucesso')
            items.forEach(item => {
                item.classList.add('item');
            });
            let currentIndex = Array.from(items).findIndex(item => item.classList.contains('active'));   
            document.querySelector('.next').addEventListener('click', () => {
                items[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % items.length;
                items[currentIndex].classList.add('active');
            });
            document.querySelector('.prev').addEventListener('click', () => {
                let currentIndex = Array.from(items).findIndex(item => item.classList.contains('active'));
                items[currentIndex].classList.remove('active');
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                items[currentIndex].classList.add('active');
            });
            // let interval = setInterval(() => {
            //     items[currentIndex].classList.remove('active');
            //     currentIndex = (currentIndex + 1) % items.length;
            //     items[currentIndex].classList.add('active');
            // }, 3000);
        }
    }
initBanner();
