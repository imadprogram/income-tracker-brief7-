const income_btn = document.getElementById('income-btn')
const expense_btn = document.getElementById('expense-btn')

const income_form_bg = document.querySelector('.income-form-bg')
const expense_form_bg = document.querySelector('.expense-form-bg')

const income_form = income_form_bg.querySelector('form')
const expense_form = expense_form_bg.querySelector('form')

income_btn.addEventListener('click', () => {
    income_form_bg.classList.remove('hidden')
    income_form.classList.add('[animation:form-animation_.5s_ease]')
})
expense_btn.addEventListener('click',()=>{
    expense_form_bg.classList.remove('hidden')
    expense_form.classList.add('[animation:form-animation_.5s_ease]')
})


income_form_bg.addEventListener('click', () => {
    income_form.classList.remove('[animation:form-animation_.5s_ease]')
    income_form_bg.classList.add('hidden')
})
expense_form_bg.addEventListener('click', () => {
    expense_form.classList.remove('[animation:form-animation_.5s_ease]')
    expense_form_bg.classList.add('hidden')
})


income_form.addEventListener('click', (e) => {e.stopPropagation()})  
expense_form.addEventListener('click', (e) => {e.stopPropagation()}) 


document.addEventListener('click',(e)=>{
    let clicked = e.target.closest('.parent')
    console.log(clicked)
})