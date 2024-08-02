const navbar = document.querySelector('.navbar')
const narbarLines = document.querySelector('.navbar-lines')
const navLinks = document.querySelector('.navbar-links')
const navLinksLi = document.querySelectorAll('.navbar-links li')


window.addEventListener('scroll', () => {
    if(this.scrollY >=100){
        navbar.classList.add ('scrolled')
    }
    else
    {
        navbar.classList.remove('scrolled')
    }
})
 
narbarLines.addEventListener('click', () => {
    navLinks.classList.toggle('active')
    narbarLines.classList.toggle('active')
})

navLinksLi.forEach(li => li.addEventListener('click',()=>{
    navLinksLi.forEach(li => li.classList.remove('active'))
    li.classList.add('active')

    narbarLines.classList.remove('active')
    navLinks.classList.remove('active')
}))

AOS.init();