<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo_s.png" type="image/x-icon">
    <link rel="stylesheet" href="styleh.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>3R JARDINAGEM</title>
</head>

<body>

    <header>
        <div class="container">
            <a href="index.php" class="logo">3R JARDINAGEM</a>
            <button class="menu-toggle" aria-label="Abrir menu"><i class="fa-solid fa-bars"></i></button>
            <nav class="menu">
                <ul>
                    <li><a href="index.php" class="active">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="formulario.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Transforme seu espaço externo e interno de maneira sustentável com diversas espécies de plantas.</h1>
            <a href="formulario.php" class="cta-btn">Solicite um orçamento de paisagismo gratuito</a>
        </div>
    </section>

    <section class="services-carousel">
        <h2>Alguns Serviços Que Realizamos</h2>
        <div class="carousel-container">
            <button class="carousel-prev" aria-label="Anterior"><i class="fa-solid fa-chevron-left"></i></button>

            <div class="carousel-wrapper">
                <div class="carousel-slide active">
                    <img src="assets/plantio_n.jpeg" alt="Plantio de Mudas">
                    <h3>Plantio de Novas Mudas</h3>
                    <p>Realizamos plantio de novas mudas para renovar e embelezar seu jardim.</p>
                    <a href="servicos.php" class="carousel-link">Saiba Mais</a>
                </div>

                <div class="carousel-slide">
                    <img src="assets/manutencao.jpeg" alt="Manutenção de Jardins">
                    <h3>Manutenção de Jardins</h3>
                    <p>Mantemos seus jardins sempre belos, saudáveis e bem cuidados.</p>
                    <a href="servicos.php" class="carousel-link">Saiba Mais</a>
                </div>

                <div class="carousel-slide">
                    <img src="assets/gramado.jpeg" alt="Implantação de Gramados">
                    <h3>Implantação de Gramados</h3>
                    <p>Realizamos o implante de gramados para embelezar seu espaço.</p>
                    <a href="servicos.php" class="carousel-link">Saiba Mais</a>
                </div>
            </div>

            <button class="carousel-next" aria-label="Próximo"><i class="fa-solid fa-chevron-right"></i></button>
        </div>

        <div class="carousel-indicators">
            <span class="indicator active" data-slide="0"></span>
            <span class="indicator" data-slide="1"></span>
            <span class="indicator" data-slide="2"></span>
        </div>
    </section>

    <section class="portifolio-section">
        <h2>O que nossos clientes dizem</h2>
        <div class="portifolio-grid">
            <div class="portifolio-item">
                <p class="Feedback-client">"O trabalho da equipe foi ótimo, além de fazerem o serviço do plantio da
                    grama, tiraram todas as nossas dúvidas sobre como manter e foram bastante proativos para resolver
                    problemas limitantes do terreno. Estou extremamente satisfeito com a qualidade do serviço no geral."
                </p>
                <p class="client-info">Flávio Alves</p>
            </div>

            <div class="portifolio-item">
                <p class="Feedback-client">"Transformar um espaço em um jardim foi mais do que apenas plantar flores;
                    foi
                    ter um cantinho de paz dentro da minha própria casa. Cada planta escolhida, cada detalhe
                    organizado e cada flor plantada carrega um sentimento. Hoje, olhar
                    para esse jardim é enxergar um refúgio que cresce junto comigo."</p>
                <p class="client-info">Maria Lúcia</p>
            </div>
            <div class="portifolio-item">
                <p class="Feedback-client">"O serviço prestado é de alta relevância na jardinagem no município de camutanga - PE. 
                     E nas residências, particulares, principalmente  em minha  residência, onde eles têm  um carinho  para com as flores e com o 
                        excelente serviço. O reflorestamento que fazem  nas praças públicas da cidade é de grande importância, preservando a biodiversidade do planeta. 
                        Minha nota para o trabalho desses preservadores é nota 10!"</p>
                <p class="client-info">Antonio Rodrigues Neto</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <h3>3R JARDINAGEM</h3>
                <p>Nossa missão é criar espaços verdes bonitos e organizados proporcionando qualidade de vida e contato
                    com a natureza.</p>
            </div>
            <div class="footer-contact-form">
                <h4>Contato Rápido</h4>
                <form action="#" method="post">
                    <input type="text" placeholder="Seu Nome" required>
                    <input type="email" placeholder="Seu Email" required>
                    <textarea placeholder="Mensagem" required></textarea>
                    <button type="submit">Enviar</button>
                </form>
                <p class="area-atendimento"> Atendemos em Camutanga e Região.</p>
            </div>
            <div class="footer-info">
                <p>(81) 9 8660-1331 - Rafael</p>
                <p>(81) 9 8598-4154 - Borges</p>
                <p>3rjardinagem@gmail.com</p>
            </div>

            <div class="footer-social">
                <a href="https://www.instagram.com/3r_jardinagens?utm_source=qr&igsh=MXdsN2VqZm1pZXNibg=="
                    target="_blank">
                    <i class="fa-brands fa-instagram"></i></a>
                <a href="https://wa.me/5581985984154" target="_blank"> <i class="fa-brands fa-whatsapp"></i></a>
            </div>
    </footer>
    <script>
        (function() {
            const toggle = document.querySelector('.menu-toggle');
            const nav = document.querySelector('nav.menu');
            if (!toggle || !nav) return;

            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                nav.classList.toggle('open');
            });

            document.addEventListener('click', function(e) {
                if (!nav.classList.contains('open')) return;
                const isClickInside = nav.contains(e.target) || toggle.contains(e.target);
                if (!isClickInside) nav.classList.remove('open');
            });
        })();
    </script>
    <script>
        (function() {
            let currentSlide = 0;
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.indicator');
            const totalSlides = slides.length;

            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                indicators.forEach(ind => ind.classList.remove('active'));

                slides[index].classList.add('active');
                indicators[index].classList.add('active');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            }

            document.querySelector('.carousel-next').addEventListener('click', nextSlide);
            document.querySelector('.carousel-prev').addEventListener('click', prevSlide);

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });

            setInterval(nextSlide, 5000);
        })();
    </script>
</body>

</html>