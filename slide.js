const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        }
        else{
            // entry.target.classList.remove('show');
        }
    });
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((e1) => observer.observe(e1));

const hiddenElements1 = document.querySelectorAll('.hidden-1');
hiddenElements1.forEach((e1) => observer.observe(e1));

const hiddenElements2 = document.querySelectorAll('.hidden-2');
hiddenElements2.forEach((e1) => observer.observe(e1));