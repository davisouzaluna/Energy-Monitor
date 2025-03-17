/*
Variaveis importantes: 

Email Login: Teste@gmail.com
Senha Login: 12345678

*/

describe('Cadastro do usuario nao existente', () => {
  it('passes', () => {
    cy.visit('http://localhost:8000')
    cy.get(':nth-child(2) > .text-blue-700').click()
    cy.get('#name').type('Teste')
    cy.get('#email').type('Teste@gmail.com')
    cy.get('#password').type('12345678')
    cy.get('#password_confirmation').type('12345678')
    cy.get('.inline-flex').click()
  })
})

describe('Cadastro do usuario existente', () => {
  it('passes', () => {
    cy.visit('http://localhost:8000')
    cy.get(':nth-child(2) > .text-blue-700').click()
    cy.get('#name').type('Teste')
    cy.get('#email').type('Teste@gmail.com')
    cy.get('#password').type('12345678')
    cy.get('#password_confirmation').type('12345678')
    cy.get('.inline-flex').click()
    cy.get('li').should('have.text', 'The email has already been taken.')
  })
})

describe('Cadastro de senha com menos de 8 caracteres', () => {
  it('passes', () => {
    cy.visit('http://localhost:8000')
    cy.get(':nth-child(2) > .text-blue-700').click()
    cy.get('#name').type('Teste')
    cy.get('#email').type('Teste@gmail.com')
    cy.get('#password').type('1234567')
    cy.get('#password_confirmation').type('1234567')
    cy.get('.inline-flex').click()
    cy.get(':nth-child(4) > .text-red-600 > li') //texto de erro
    
  })
})

describe('redirect para a pagina de login', () => {
  it('passes', () => {
    cy.visit('http://localhost:8000')
    cy.get(':nth-child(2) > .text-blue-700').click()
    cy.get('.underline').click()
    cy.url().should('include', '/login')
  })
}
)

