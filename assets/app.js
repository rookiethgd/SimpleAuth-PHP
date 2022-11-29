Toaster = function() {

    Toaster.amount = 0;

    Toaster.default = {
        color: '#C5C56A',
        autoClose: true,
        autoCloseDelay: 2000,
        position: 'right-top'
    };

    Toaster.toast = function(m, options = Toaster.default){
        if($('#toast-'+Toaster.amount).length) Toaster.dismiss('#toast-'+Toaster.amount);
        Toaster.amount++;

        var id = 'toast-'+Toaster.amount;
        var selector = '#'+id;
        $toast = $('<div class="toaster"></div>').attr('id',id).text(m).css({'background': options.color || Toaster.default.color}).addClass('toaster-'+(options.position || Toaster.default.position));
        $('body').append($toast);
        setTimeout(function(){
            $(selector).addClass('toasting');
        }, 1);

        $(selector).click(function(){
            if(options.onClick) options.onClick();
            Toaster.dismiss(selector);
        });

        var autoClose=Toaster.default.autoClose;
        if(options.autoClose!==undefined) autoClose=options.autoClose;
        if(autoClose) {
            setTimeout(function(){
                Toaster.dismiss(selector);
            }, options.autoCloseDelay || Toaster.default.autoCloseDelay);
        }
    }
    Toaster.send = Toaster.toast;

    Toaster.error = function(m, options) {
        Toaster.default.color='#F44236';
        Toaster.toast(m, options);
        Toaster.default.color='#C5C56A';
    }

    Toaster.dismiss = function(toast) {
        $(toast).removeClass('toasting').addClass('toast-dismissed');
        setTimeout(function(){
            $(toast).remove();
        }, 1000);
    }
};

new Toaster();

(function() {
    
    window.onload = function() {
        console.log('App Loaded.');
        window.setTimeout(fade_out, 100);
    };

    function fade_out() {
        document.querySelector('.preloader').classList.add('hidden');
        window.setTimeout(() => {
            document.querySelector('.preloader').style.display = "none";
        }, 800);
    }

    window.onscroll = function() {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;
        if (window.pageYOffset > sticky) {
            header_navbar.classList.add("sticky");
        } else {
            header_navbar.classList.remove("sticky");
        }
        var backToTo = document.querySelector(".scroll-top");
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        }
    };

    function onScroll(event) {
        var sections = document.querySelectorAll('.page-scroll');
        var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
        for (var i = 0; i < sections.length; i++) {
            var currLink = sections[i];
            var val = currLink.getAttribute('href');
            var refElement = document.querySelector(val);
            var scrollTopMinus = scrollPos + 73;
            if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight > scrollTopMinus)) {
                document.querySelector('.page-scroll').classList.remove('active');
                currLink.classList.add('active');
            } else {
                currLink.classList.remove('active');
            }
        }
    };

    window.document.addEventListener('scroll', onScroll);
    var pageLink = document.querySelectorAll('.page-scroll');
    pageLink.forEach(elem => {
        elem.addEventListener('click', e => {
            e.preventDefault();
            document.querySelector(elem.getAttribute('href')).scrollIntoView({
                behavior: 'smooth',
                offsetTop: 1 - 60
            });
        });
    });
})();