# 🛒 Sistema de Vendas - PHP Puro

Sistema web completo e funcional para gestão de vendas, desenvolvido **100% em PHP puro**. Segue uma arquitetura MVC simplificada, utiliza PDO com *prepared statements*, gerencia sessões com segurança e aplica transações atômicas para garantir a integridade dos dados.

---

## ✨ Funcionalidades

- 🔐 **Autenticação segura**: Login com verificação de credenciais e hashing de senhas
- 📦 **Gestão de Produtos**: Cadastro, listagem e controle de estoque
- 🛒 **Registro de Vendas**: Seleção múltipla de produtos, cálculo automático e baixa no estoque
- 📊 **Dashboard**: Métricas em tempo real (total de vendas e faturamento)
- 🔄 **Transações Atômicas**: Garante que vendas sejam salvas integralmente ou revertidas em caso de erro
- 🛡️ **Proteção Nativa**: Contra SQL Injection e Cross-Site Scripting (XSS)

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Versão Mínima |
|------------|---------------|
| PHP        | 7.4+          |
| MySQL / MariaDB | 5.7+ / 10.3+ |
| HTML5 + CSS3 | Navegadores modernos |

> ⚠️ **Não utiliza frameworks ou bibliotecas externas.** Apenas PHP nativo, PDO e SQL padrão.