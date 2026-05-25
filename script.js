// ===== SALUDO AL HACER CLIC EN HERO =====
function mostrarSaludo() {
  const saludos = [
    "🐾 ¡Los Dachshunds son los mejores compañeros del mundo!",
    "🌭 ¿Sabías que 'Dachshund' significa 'perro tejón' en alemán?",
    "❤️ Un salchicha en casa = felicidad garantizada.",
    "🐶 Son pequeños en tamaño, ¡pero enormes en amor!",
    "🛋️ Su actividad favorita: acurrucarse contigo en el sofá.",
  ];

  const indice = Math.floor(Math.random() * saludos.length);
  const caja   = document.getElementById("saludo-box");

  caja.classList.remove("hidden");
  caja.textContent = saludos[indice];

  // Ocultar después de 4 segundos
  setTimeout(() => caja.classList.add("hidden"), 4000);
}

// ===== GALERÍA =====
const mensajesFoto = [
  "😍 ¡Qué foto más tierna!",
  "📸 Un salchicha fotogénico como siempre.",
  "🐾 ¡Míralo, es perfecto!",
  "🌭 Pequeñito pero con mucha actitud.",
  "❤️ ¿Cómo alguien puede resistirse?",
  "🎉 ¡El modelo del año!",
];

function verFoto(elemento) {
  // Efecto visual en el elemento clickeado
  elemento.style.transform = "scale(1.3) rotate(5deg)";
  setTimeout(() => (elemento.style.transform = ""), 400);

  // Mostrar mensaje aleatorio
  const msg    = document.getElementById("foto-msg");
  const indice = Math.floor(Math.random() * mensajesFoto.length);
  msg.textContent = mensajesFoto[indice];
}

// ===== CURIOSIDADES =====
const curiosidades = [
  "🐾 Los Dachshunds fueron criados en Alemania hace más de 300 años para cazar tejones bajo tierra.",
  "📏 Existen en dos tamaños: estándar (hasta 9 kg) y miniatura (hasta 5 kg).",
  "🎨 Tienen 3 tipos de pelaje: liso, de pelo largo y de pelo duro.",
  "🏆 En Alemania son un símbolo cultural tan importante que usaron uno como mascota en los Juegos Olímpicos de Munich 1972.",
  "🐕 Son el perro con la columna más larga en relación a su tamaño, lo que los hace vulnerables a problemas de espalda.",
  "🌍 Son la raza más popular en Alemania y están entre las 12 más populares en EE.UU.",
  "🎭 Su personalidad es tan intensa que muchos dueños dicen que en realidad son gatos atrapados en cuerpos de perro.",
  "🏃 A pesar de sus patas cortas, son increíblemente rápidos y ágiles cuando se lo proponen.",
  "❤️ Son famosos por elegir a 'una persona favorita' en la familia y seguirla a todas partes.",
  "🌭 El apodo 'perro salchicha' viene de su forma alargada, que recuerda a una salchicha wiener.",
];

let ultimaCuriosidad = -1;

function nuevaCuriosidad() {
  let indice;

  // Evitar repetir la misma
  do {
    indice = Math.floor(Math.random() * curiosidades.length);
  } while (indice === ultimaCuriosidad);

  ultimaCuriosidad = indice;

  const caja = document.getElementById("curiosidad-texto");

  // Animación de cambio
  caja.style.opacity = "0";
  caja.style.transform = "translateY(10px)";

  setTimeout(() => {
    caja.textContent = curiosidades[indice];
    caja.style.opacity = "1";
    caja.style.transform = "translateY(0)";
    caja.style.transition = "all 0.4s ease";
  }, 200);
}

// ===== ANIMACIÓN AL HACER SCROLL (Intersection Observer) =====
const observador = new IntersectionObserver(
  (entradas) => {
    entradas.forEach((entrada) => {
      if (entrada.isIntersecting) {
        entrada.target.style.opacity    = "1";
        entrada.target.style.transform  = "translateY(0)";
      }
    });
  },
  { threshold: 0.1 }
);

// Aplicar animación inicial a las cards y secciones
document.querySelectorAll(".card, .galeria-item").forEach((el) => {
  el.style.opacity   = "0";
  el.style.transform = "translateY(30px)";
  el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
  observador.observe(el);
});
