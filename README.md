
# Sobre o projeto

Esta aplicação foi desenvolida como parte do processo seletivo para a vaga de desenvolvedor WEB da empresa AvaliaSistemas. Todas as operações de CRUD (Listagem, insert, update e delete) são feitas com jQuery.

#
[CRUD](https://user-images.githubusercontent.com/81712575/184274476-97ac6b66-f736-44db-8b1c-7b34e6155e2c.mp4)


# Tecnologias utilizadas
- PHP
- HTML / CSS / JS 


# Entendendo a Aplicação
## As paginas da aplicação podem ser acessadas passando via GET as informações de Classe/Metodo/Paramentro;
### Get delete (id)
![delete url](https://user-images.githubusercontent.com/81712575/184270608-ec1a9440-f1d2-42b0-9744-fafecfee39cc.jpg)
### Post read (busca) / Post read (id)
![read](https://user-images.githubusercontent.com/81712575/184270890-9cca87b4-5911-4b4c-9e06-aecaad236cfd.jpg)
![busca](https://user-images.githubusercontent.com/81712575/184278032-eb308eac-f3e4-48e0-8198-475b3cc8cd0d.jpg)
### Post create ( dados )
![create](https://user-images.githubusercontent.com/81712575/184277270-94f931d0-a622-4c8e-a63c-920fac3859f0.jpg)
### Post update (dados + id)
![update](https://user-images.githubusercontent.com/81712575/184277577-7874c5e9-9b90-4699-ab02-a3e8fd7a075f.jpg)



- O arquivo index.php é utilizado como ponto de acesso, a partir dai, o a.htaccess e o core irão fazer o gerenciamento da url
- Quando a Classe ou ou Método não existir, as Configurações do Core irão chamar a Classe e o método pré-definido.

 ![core](https://user-images.githubusercontent.com/81712575/184271194-00604da3-3090-44bc-919c-7483b786ad06.jpg)


