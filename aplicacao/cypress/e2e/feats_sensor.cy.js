


Cypress.on('uncaught:exception', (err, runnable) => {
    // Ignorar esse erro específico, pois eh o erro do controller, que foi demonstrado no teste do login
    if (err.message.includes('Cannot read properties of null')) {
      return false;  
    }
    return true;
  });


describe('visualizacao do grafico', () => {
        it('passes', () => {
            cy.visit('http://localhost:8000')
            cy.get('.space-x-4 > :nth-child(1)').click()
            cy.get('#email').type('Teste@gmail.com')
            cy.get('#password').type('12345678')
            cy.get('.flex > .inline-flex').click()
            cy.get('#nome').type('Sensor Teste')
            cy.get('#descricao').type('Sensor de teste')
            cy.get('#mac').type('BC:FF:4D:FB:5E:B4')
            cy.get('.flex > .px-4').click()

            //grafico
            cy.get('.d-flex > .px-3').click()
            cy.get('#myChart').should('be.visible')
    
            //excluindo
            cy.get(':nth-child(1) > .mb-6 > .flex').click()
            cy.get('form > .mx-2').click()
    
                }
    
            )     
            
        }
)

        
describe('alteracao do nome do sensor', () => {
        it('passes', () => {
            cy.visit('http://localhost:8000')
            cy.get('.space-x-4 > :nth-child(1)').click()
            cy.get('#email').type('Teste@gmail.com')
            cy.get('#password').type('12345678')
            cy.get('.flex > .inline-flex').click()
            cy.get('#nome').type('Sensor Teste')
            cy.get('#descricao').type('Sensor de teste')
            cy.get('#mac').type('BC:FF:4D:FB:5E:B4')
            cy.get('.flex > .px-4').click()

            //configuracao do sensor
            cy.get('.d-flex > .px-3').click()
            cy.get('#nome').type(' 2')//adicionando o 2 no nome
            cy.get('.flex > .px-4').click()
            cy.get(':nth-child(1) > .mb-6 > .flex').click()
    
            //excluindo o sensor
            cy.get(':nth-child(1) > .mb-6 > .flex').click()
            cy.get('form > .mx-2').click()
            
                }
    
            )     
            
        }
        )

       