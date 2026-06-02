<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    
<div class="product-detail-container">
  <div class="decoration-circle decoration-circle--pink"></div>
  <div class="decoration-circle decoration-circle--blue"></div>
  <div class="decoration-square decoration-square--yellow"></div>

  <div class="product-detail-wrapper">
    <div class="product-detail__image-section">
      <div class="image-frame">
        <div class="image-frame__inner">
          <img 
            src="{{ asset('storage/' . $producto->imagen) }}" 
            alt="{{ $producto->nombre }}"
            class="product-detail__image"
          />
        </div>
        <div class="image-label">{{ $producto->nombre }}</div>
      </div>
    </div>

    <div class="product-detail__info-section">
      
      <div class="product-detail__header">
        <h1 class="product-detail__title">{{ $producto->nombre }}</h1>
        <div class="price-badge">
          <span class="price-badge__currency">$</span>
          <span class="price-badge__amount">{{ number_format($producto->precio, 2, ',', '.') }}</span>
        </div>
      </div>

      <div class="product-detail__description">
        <p class="description-text">{{ $producto->descripcion }}</p>
      </div>

      <div class="stock-status">
        @if($producto->stock > 0)
          <div class="stock-status__available">
            <span class="stock-badge stock-badge--in">✓ En Stock</span>
            <span class="stock-quantity">{{ $producto->stock }} disponibles</span>
          </div>
        @else
          <div class="stock-status__unavailable">
            <span class="stock-badge stock-badge--out">✗ Agotado</span>
          </div>
        @endif
      </div>

      @if($producto->categoria)
        <div class="product-detail__meta">
          <span class="meta-label">Categoría:</span>
          <span class="meta-value">{{ $producto->categoria }}</span>
        </div>
      @endif

      @if($producto->talla)
        <div class="product-detail__meta">
          <span class="meta-label">Talla:</span>
          <span class="meta-value">{{ $producto->talla }}</span>
        </div>
      @endif

      @if($producto->color)
        <div class="product-detail__meta">
          <span class="meta-label">Color:</span>
          <span class="meta-value">{{ $producto->color }}</span>
        </div>
      @endif

      <div class="product-detail__action">
        <button 
          class="btn-add-to-bag @if($producto->stock <= 0) disabled @endif"
          @if($producto->stock <= 0) disabled @endif
        >
          <span class="btn-text">Add to Bag</span>
          <span class="btn-icon">→</span>
        </button>
      </div>

      <div class="product-detail__extras">
        <div class="extra-item">
          <span class="extra-icon">📦</span>
          <span class="extra-text">Envío gratis en compras mayores</span>
        </div>
        <div class="extra-item">
          <span class="extra-icon">↩️</span>
          <span class="extra-text">30 días para devoluciones</span>
        </div>
        <div class="extra-item">
          <span class="extra-icon">💳</span>
          <span class="extra-text">Múltiples formas de pago</span>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
  :root {
    --color-pink-primary: #f5a3c7;
    --color-pink-dark: #e6739e;
    --color-pink-light: #fdd4e8;
    
    --color-blue-primary: #a8d8f0;
    --color-blue-dark: #5ba3d1;
    --color-blue-light: #e0f4ff;
    
    --color-yellow-primary: #f4d35e;
    --color-yellow-dark: #d4a63f;
    --color-yellow-light: #fef3c7;
    
    --color-brown-primary: #a67c52;
    --color-brown-dark: #6b5344;
    --color-brown-light: #d4b5a0;
    
    --color-neutral-dark: #2a2a2a;
    --color-neutral-light: #f9f7f4;
    
    --font-display: 'Georgia', 'Times New Roman', serif;
    --font-body: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: var(--font-body);
    background: linear-gradient(135deg, var(--color-neutral-light) 0%, #fff5f0 50%, #f0f4ff 100%);
    color: var(--color-neutral-dark);
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* Decorative Elements */
  .decoration-circle {
    position: fixed;
    border-radius: 50%;
    opacity: 0.15;
    z-index: -1;
    pointer-events: none;
  }

  .decoration-circle--pink {
    width: 300px;
    height: 300px;
    background: var(--color-pink-primary);
    top: -50px;
    right: -100px;
    animation: float 6s ease-in-out infinite;
  }

  .decoration-circle--blue {
    width: 250px;
    height: 250px;
    background: var(--color-blue-primary);
    bottom: 10%;
    left: -50px;
    animation: float 8s ease-in-out infinite 2s;
  }

  .decoration-square--yellow {
    position: fixed;
    width: 150px;
    height: 150px;
    background: var(--color-yellow-primary);
    bottom: 20%;
    right: 5%;
    transform: rotate(15deg);
    opacity: 0.1;
    z-index: -1;
    animation: rotate 20s linear infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0px) translateX(0px); }
    50% { transform: translateY(-30px) translateX(10px); }
  }

  @keyframes rotate {
    0% { transform: rotate(15deg); }
    100% { transform: rotate(375deg); }
  }

  /* Main Container */
  .product-detail-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 3rem 2rem;
    position: relative;
  }

  .product-detail-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    border: 2px solid rgba(245, 163, 199, 0.3);
    animation: slideInUp 0.8s ease-out;
  }

  @keyframes slideInUp {
    from {
      opacity: 0;
      transform: translateY(40px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Image Section */
  .product-detail__image-section {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  .image-frame {
    position: relative;
    width: 100%;
    max-width: 450px;
  }

  .image-frame__inner {
    position: relative;
    background: linear-gradient(135deg, var(--color-pink-light) 0%, var(--color-blue-light) 100%);
    padding: 30px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 
      0 20px 60px rgba(245, 163, 199, 0.15),
      inset 0 1px 0 rgba(255, 255, 255, 0.5);
    border: 3px solid var(--color-brown-light);
    animation: frameFloat 4s ease-in-out infinite;
  }

  @keyframes frameFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
  }

  .product-detail__image {
    width: 100%;
    height: auto;
    object-fit: cover;
    display: block;
    border-radius: 10px;
  }

  .image-label {
    position: absolute;
    bottom: -40px;
    left: 50%;
    transform: translateX(-50%);
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: bold;
    color: var(--color-brown-dark);
    white-space: nowrap;
    letter-spacing: 2px;
    text-transform: uppercase;
    opacity: 0.7;
  }

  /* Info Section */
  .product-detail__info-section {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    padding-top: 20px;
  }

  /* Header */
  .product-detail__header {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
  }

  .product-detail__title {
    font-family: var(--font-display);
    font-size: 3rem;
    font-weight: bold;
    color: var(--color-neutral-dark);
    line-height: 1.2;
    text-shadow: 2px 2px 0px var(--color-pink-light);
    animation: slideInDown 0.8s ease-out;
  }

  @keyframes slideInDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .price-badge {
    display: inline-flex;
    align-items: baseline;
    gap: 0.3rem;
    width: fit-content;
    background: linear-gradient(135deg, var(--color-yellow-primary) 0%, var(--color-pink-primary) 100%);
    padding: 1rem 2rem;
    border-radius: 50px;
    box-shadow: 0 8px 25px rgba(244, 211, 94, 0.3);
    border: 2px solid var(--color-brown-primary);
  }

  .price-badge__currency {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--color-brown-dark);
  }

  .price-badge__amount {
    font-family: 'Courier New', monospace;
    font-size: 2.5rem;
    font-weight: bold;
    color: var(--color-neutral-dark);
    letter-spacing: 1px;
  }

  /* Description */
  .product-detail__description {
    border-left: 4px solid var(--color-pink-primary);
    padding-left: 1.5rem;
  }

  .description-text {
    font-size: 1.05rem;
    line-height: 1.8;
    color: var(--color-neutral-dark);
    opacity: 0.85;
  }

  /* Stock Status */
  .stock-status {
    padding: 1.5rem;
    border-radius: 12px;
    background: rgba(230, 244, 255, 0.7);
    border: 2px dashed var(--color-blue-primary);
  }

  .stock-status__available {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .stock-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: bold;
    font-size: 0.9rem;
    letter-spacing: 1px;
  }

  .stock-badge--in {
    background: linear-gradient(135deg, var(--color-blue-primary), var(--color-blue-light));
    color: var(--color-blue-dark);
    box-shadow: 0 4px 12px rgba(91, 163, 209, 0.2);
  }

  .stock-badge--out {
    background: linear-gradient(135deg, #ffb3ba, #ffcccb);
    color: #a52a2a;
    box-shadow: 0 4px 12px rgba(255, 107, 107, 0.2);
  }

  .stock-quantity {
    font-size: 1rem;
    color: var(--color-blue-dark);
    font-weight: 600;
  }

  /* Meta Info */
  .product-detail__meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.8rem;
    background: rgba(244, 211, 94, 0.1);
    border-radius: 8px;
    border-left: 3px solid var(--color-yellow-primary);
  }

  .meta-label {
    font-weight: bold;
    color: var(--color-brown-dark);
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .meta-value {
    color: var(--color-neutral-dark);
    font-size: 1rem;
  }

  /* Action Button */
  .product-detail__action {
    margin-top: 1rem;
  }

  .btn-add-to-bag {
    width: 100%;
    padding: 1.5rem 2rem;
    font-size: 1.3rem;
    font-weight: bold;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    background: linear-gradient(135deg, var(--color-pink-primary) 0%, var(--color-pink-dark) 100%);
    color: white;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    box-shadow: 0 15px 40px rgba(230, 115, 158, 0.4);
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
    overflow: hidden;
  }

  .btn-add-to-bag::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--color-pink-light) 0%, var(--color-pink-primary) 100%);
    transition: left 0.3s ease;
    z-index: -1;
  }

  .btn-add-to-bag:hover:not(.disabled) {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(230, 115, 158, 0.5);
  }

  .btn-add-to-bag:hover:not(.disabled) .btn-icon {
    transform: translateX(5px);
  }

  .btn-add-to-bag.disabled {
    background: #ccc;
    color: #666;
    cursor: not-allowed;
    box-shadow: none;
    opacity: 0.6;
  }

  .btn-text {
    display: inline-block;
  }

  .btn-icon {
    display: inline-block;
    transition: transform 0.3s ease;
    font-size: 1.5rem;
  }

  /* Extras */
  .product-detail__extras {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 1rem;
  }

  .extra-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(166, 124, 82, 0.08);
    border-radius: 10px;
    border-left: 3px solid var(--color-brown-primary);
    transition: all 0.3s ease;
  }

  .extra-item:hover {
    background: rgba(166, 124, 82, 0.15);
    transform: translateX(5px);
  }

  .extra-icon {
    font-size: 1.5rem;
    display: inline-block;
    min-width: 30px;
    text-align: center;
  }

  .extra-text {
    font-size: 0.95rem;
    color: var(--color-neutral-dark);
    font-weight: 500;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .product-detail-wrapper {
      grid-template-columns: 1fr;
      gap: 2rem;
      padding: 2rem;
    }

    .product-detail__title {
      font-size: 2rem;
    }

    .price-badge__amount {
      font-size: 1.8rem;
    }

    .btn-add-to-bag {
      padding: 1.2rem 1.5rem;
      font-size: 1.1rem;
    }

    .image-label {
      bottom: -35px;
      font-size: 1rem;
    }

    .product-detail-container {
      padding: 1.5rem;
    }
  }

  @media (max-width: 480px) {
    .product-detail-wrapper {
      border-radius: 12px;
      padding: 1.5rem;
    }

    .product-detail__title {
      font-size: 1.6rem;
    }

    .price-badge {
      padding: 0.8rem 1.5rem;
    }

    .price-badge__amount {
      font-size: 1.5rem;
    }

    .product-detail__info-section {
      gap: 1.5rem;
    }

    .extra-item {
      padding: 0.8rem;
      font-size: 0.85rem;
    }
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>