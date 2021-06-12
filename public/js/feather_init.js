window.onload = ()=>{
    const app  = document.getElementById('app');
    app.style.opacity = '0';
    app.style.transition = 'all 250ms';
    setTimeout(()=>{
        app.style.opacity = '1';
        feather.replace();
    }, 500);
}