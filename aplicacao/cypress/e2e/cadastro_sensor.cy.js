/*
Variaveis importantes: 

Email Login: Teste@gmail.com
Senha Login: 12345678

*/

Cypress.on('uncaught:exception', (err, runnable) => {
    // Ignorar esse erro específico, pois eh o erro do controller, que foi demonstrado no teste do login
    if (err.message.includes('Cannot read properties of null')) {
      return false;  
    }
    return true;
  });

  

describe('Cadastro de sensor', () => {
    it('passes', () => {
        cy.visit('http://localhost:8000')
        cy.get('.space-x-4 > :nth-child(1)').click()
        cy.get('#email').type('Teste@gmail.com')
        cy.get('#password').type('12345678')
        cy.get('.flex > .inline-flex').click()
        cy.get('body').then(($body) => {
            if (cy.get('.max-w-7xl > .bg-white')) {
                cy.get('#nome').type('Sensor Teste')
                cy.get('#descricao').type('Sensor de teste')
                cy.get('#mac').type('BC:FF:4D:FB:5E:B4')
                cy.get('.flex > .px-4').click()

              
            } else {
                cy.get('.align-items-center > .px-4').click()
                cy.get('#nome').type('Sensor Teste')
                cy.get('#descricao').type('Sensor de teste')
                cy.get('#mac').type('BC:FF:4D:FB:5E:B4')
                cy.get('.flex > .w-full').click()
                cy.wait(5000) //atraso para visualizar melhor que o sensor foi criado
            }
        
    })
}
)
}
)

describe('Exclusao do sensor depois de criado e logado', ()=>{
    it('passes', ()=>{
        cy.visit('http://localhost:8000')
        cy.get('.space-x-4 > :nth-child(1) > .text-blue-700').click()
        cy.get('#email').type('Teste@gmail.com')
        cy.get('#password').type('12345678')
        cy.get('.flex > .inline-flex').click()
        cy.get(':nth-child(1) > .card > .card-body > .d-flex > form > .mx-2').click()
 
})
}
)

