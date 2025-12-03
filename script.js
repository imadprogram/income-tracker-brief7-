const income_btn = document.getElementById('income-btn')
const expense_btn = document.getElementById('expense-btn')
const form_bg = document.querySelector('.income-form-bg')
const expense_form_bg = document.querySelector('.expense-form-bg')
const form = document.querySelector('form')

income_btn.addEventListener('click', () => {
    form_bg.classList.remove('hidden')
    form.classList.add('[animation:form-animation_.5s_ease]')
})
expense_btn.addEventListener('click',()=>{
    expense_form_bg.classList.remove('hidden')
    expense_form_bg.classList.add('[animation:form-animation_.5s_ease]')
})
form_bg.addEventListener('click', () => {
    form.classList.remove('[animation:form-animation_.5s_ease]')
    form.classList.add('[animation:form-animation_.5s_ease_reverse]')
    setTimeout(() => {
        form_bg.classList.add('hidden')
    }, 500);
})
form.addEventListener('click', (e) => {
    e.stopPropagation()
})