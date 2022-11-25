import keyboard
from random import *
import math


notebooks = [
            [
                "Samsung Flash F30",
                "Para quem prefere um computador que oferece um design retrô, o Samsung Flash F30 é uma excelente alternativa. O motivo de o incluirmos entre os melhores notebooks é que ele é ideal para quem precisa de algo portátil, simples e com baixo custo."
            ],
    [
                "Dell Inspiron A60P",
                "Já para quem está em busca de um dos melhores notebooks para trabalho que ofereça especificações mais avançadas, não podemos deixar de recomendar o Inspiron i15 3501-A60P da Dell, um dispositivo completo para sua rotina."
            ],
    [
                "Vaio FE15",
                "Não poderíamos deixar o FE15 da Vaio fora de nossa lista dos melhores notebooks. Para a sua faixa de preço, ele é uma das opções mais competitivas e que oferece o melhor desempenho entre as demais marcas."
            ],
    [
                "Samsung Book NP550XDA-KS1BR",
                "Se estiver em busca de um notebook mais potente, você pode optar pelo notebook NP550XDA-KS1BR da Samsung, um dispositivo que possui um excelente desempenho, pois está equipado com um processador Intel Core i7-1165G7 de 11ª geração e que conta com uma placa de vídeo integrada Intel® Iris® Xe."
            ],
    [
                "Dell Inspiron i15-i1100-M25P",
                "O Inspiron i15-i1100-M25P da Dell oferece excelente custo-benefício ao disponibilizar um notebook para trabalho com um processador i3 1115G4 de 11ª geração, armazenamento SSD de 256GB e 4GB de memória DDR4, tudo isso com um valor abaixo de quatro mil reais."
            ],
    [
                "Acer Aspire 5",
                "Contando com um Intel Core i5-10210U (10ª geração) e 512GB de armazenamento SSD, o Aspire 5 é uma excelente escolha para quem não quer se preocupar com desempenho, processamento e espaço de disco."
            ],
    [
                "SAMSUNG Book NP550XDA-KV1BR",
                "O Samsung Book NP550XDA-KV1BR é um competidor direto do Ideapad S145 da Lenovo e não poderia ficar fora da nossa lista de melhores notebooks para trabalho. Além de ter dimensões compactas e teclado numérico, ele garante um excelente desempenho por oferecer processadores Intel da 11ª geração."
            ],
    [
                "Lenovo Ultrafino Ideapad S145 i7",
                "O Ideapad S145 da Lenovo é uma excelente opção para quem busca um notebook extremamente leve e que garante desempenho para que você consiga realizar essencialmente qualquer tipo de atividade que não envolva um processamento gráfico pesado, como edição de fotos e vídeos ou uso de AutoCAD, por exemplo."
            ]
]


sla = [
    "Samsung Flash F30",
    "Dell Inspiron A60P",
    "Vaio FE15",
    "Samsung Book NP550XDA-KS1BR",
    "Dell Inspiron i15-i1100-M25P",
    "Acer Aspire 5",
    "SAMSUNG Book NP550XDA-KV1BR",
    "Lenovo Ultrafino Ideapad S145 i7"
]

# for i in notebooks:
#     i.append(str(randint(2600, 8350)) + '.99')

# keyboard.wait('\b')

# for i in notebooks: #name
#     keyboard.write(i[0])
#     keyboard.press('enter')

# keyboard.wait('\b')

# for i in notebooks: #desc
#     keyboard.write(i[1])
#     keyboard.press('enter')

# keyboard.wait('\b')

# for i in notebooks:  # price
#     num = float(i[2])
#     keyboard.write(
#         str(int(num + random()*num/10 - random()*num/10)) + '.99')
#     keyboard.press('enter')


keyboard.wait('\b')


for i in notebooks:  # storage
    num = choice([0, 1, 1])
    keyboard.write(str(num))
    keyboard.press('enter')

# keyboard.wait('\b')

# for i in notebooks:  # user
#     num = choice([0, 1, 1])
#     keyboard.write(num)
#     keyboard.press('enter')