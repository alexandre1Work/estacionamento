# SGE - Sistema de Gestão para Estacionamentos

O **SGE (Sistema de Gestão para Estacionamentos)** é uma solução abrangente projetada para atender às necessidades específicas de empresas de estacionamento. Com diversas funcionalidades integradas, o sistema permite um controle eficiente e centralizado das informações essenciais para a gestão de um estacionamento.

---

## ✨ Funcionalidades  

- **Gestão Financeira:** Controle de valores a receber dos mensalistas e tickets avulsos, incluindo status de pagamento.  
- **Controle de Vagas:** Visualização em tempo real do total de vagas ocupadas e livres, categorizadas.  
- **Gerenciamento de Entradas e Saídas:** Cadastro, visualização, encerramento, exclusão e impressão de tickets.  
- **Gestão de Mensalistas e Usuários:** Cadastro, edição e remoção de mensalistas, mensalidades e usuários.  
- **Precificação Flexível:** Configuração personalizada das tarifas do estacionamento.  
- **Cadastro de Formas de Pagamento:** Opções configuráveis para o fechamento de tickets.  
- **Central de Notificações:** Alertas e avisos integrados ao sistema.  
- **Tratamento de Erros e Restrições:** Garantia da integridade dos dados e prevenção de inconsistências.  

---

## 📝 Restrições e Validações  

O sistema impede a exclusão ou desativação de registros essenciais, como:  

- Mensalistas e mensalidades ativas  
- Tickets e pagamentos em aberto  
- Usuários administradores  
- Categorias e formas de pagamento vinculadas a registros ativos  

---

## 🛠️ Tecnologias Utilizadas  

O projeto foi desenvolvido utilizando as seguintes tecnologias:  

- **Backend:** PHP (CodeIgniter 3), SQL  
- **Frontend:** HTML, CSS, JavaScript, Bootstrap  
- **Segurança e Autenticação:** IonAuth  
- **Impressão do Ticket:** Dompdf  
- **Gerenciamento de Tempo:** ThimeKit  

---

## 🛡️ Instalação e Configuração  

1. Clone o repositório:  
   ```bash
   git clone https://github.com/seu-usuario/SGE.git
