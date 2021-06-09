Não Divulgue - Post Alert (Plugin WordPress)

[+] Objetivo
Enviar alerta para e-mail do aprovador assim que qualquer post entrar em revisão.

[+] Configurações
As entradas abaixo devem ser inseridas e modificadas diretamente no wp-config.php.

```
/** ND Post Alert ----------------------------------------- */

define( 'APROVADOR', 'destinatario@empresa.com.br' );

define( 'SMTP_HOST', 'smtp.empresa.com.br' );
define( 'SMTP_AUTH', true );
define( 'SMTP_PORT', '587' );
define( 'SMTP_SECURE', '' );
define( 'SMTP_USERNAME', 'usuario@empresa.com.br' );
define( 'SMTP_PASSWORD', 'senha' );
define( 'SMTP_FROM', 'remetente@empresa.com.br' );
define( 'SMTP_FROMNAME', 'Nome Remetente' );
/** ------------------------------------------------------- */
```
