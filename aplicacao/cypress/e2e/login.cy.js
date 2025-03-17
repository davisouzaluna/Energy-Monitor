/*
Variaveis importantes: 

Email Login: Teste@gmail.com
Senha Login: 12345678

*/


describe('Login do usuario com senha errada', () => {
    it('passes', () => {
        cy.visit('http://localhost:8000')
        cy.get('.space-x-4 > :nth-child(1)').click()
        cy.get('#email').type('Teste@gmail.com')
        cy.get('#password').type('12345679')
        cy.get('.flex > .inline-flex').click()
        cy.get('li').should('have.text', 'These credentials do not match our records.')
    }
    )
}
)
//Nesse teste a aplicacao eh executada, mas um elemento do DOM nao eh encontrado, o que faz com que o teste falhe. Deixei este teste para deixar claro isso. 
/*
O erro tem relacao com o elemento imagem que ele esta tentando cadastrar(mas isso era uma feat passada). Provavelmente teria que ser passado 
por uma refatoracao no controller para evitar isso.
*/
describe('Login do usuario', () => {
    it('passes', () => {
        cy.visit('http://localhost:8000')
        cy.get('.space-x-4 > :nth-child(1)').click()
        cy.get('#email').type('Teste@gmail.com')
        cy.get('#password').type('12345678')
        cy.get('.flex > .inline-flex').click()
        cy.url().should('include', '/dashboard')
    }
    )
}
)

describe('Login com email invalido', ()=>{
    it('passes', () => {
    cy.visit('http://localhost:8000')
    cy.get('.space-x-4 > :nth-child(1)').click()
    cy.get('#email').type('Teste')
    cy.get('#password').type('12345678')
    cy.get('.flex > .inline-flex').click()
    cy.get('#email')  // Seletor para o campo de email
            .then(($input) => {
                const errorMessage = $input[0].validationMessage  // Captura a mensagem de erro do campo
                expect(errorMessage).to.include('Please include an \'@\' in the email address')  // Verifique a mensagem
            })
        
}
)
}
)


describe('Credenciais incorretas', ()=>{
    it('passes', ()=>{
        cy.visit('http://localhost:8000')
        cy.get('.space-x-4 > :nth-child(1)').click()
        cy.get('#email').type('Teste@gmail.com')
        cy.get('#password').type('testepassword')
        cy.get('.flex > .inline-flex').click()
        cy.get('li').should('have.text', 'These credentials do not match our records.')
})

})

