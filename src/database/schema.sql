CREATE DATABASE IF NOT EXISTS oficina_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE oficina_db;

CREATE TABLE IF NOT EXISTS pecas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    codigo_sku VARCHAR(50) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL DEFAULT 10,
    imagem_url VARCHAR(255) DEFAULT 'https://placehold.co/300x200/222/fff?text=Peca+Auto'
);

INSERT INTO pecas (nome, categoria, codigo_sku, preco, estoque, imagem_url) VALUES
('Kit Pastilha de Freio Dianteira Cerâmica', 'Freios', 'FR-9012', 149.90, 15, 'https://placehold.co/300x200/1e293b/f8fafc?text=Pastilha+de+Freio'),
('Amortecedor Dianteiro Pressurizado', 'Suspensão', 'SP-4410', 389.00, 8, 'https://placehold.co/300x200/1e293b/f8fafc?text=Amortecedor'),
('Filtro de Óleo Blindado Linha Leve', 'Motor', 'MT-1022', 34.50, 40, 'https://placehold.co/300x200/1e293b/f8fafc?text=Filtro+de+Oleo'),
('Vela de Ignição Iridium (Jogo c/ 4)', 'Ignição', 'IG-7731', 210.00, 12, 'https://placehold.co/300x200/1e293b/f8fafc?text=Velas+Iridium'),
('Disco de Freio Ventilado Par', 'Freios', 'FR-8820', 275.00, 10, 'https://placehold.co/300x200/1e293b/f8fafc?text=Disco+de+Freio'),
('Correia Dentada e Tensor Kit', 'Motor', 'MT-5509', 195.80, 18, 'https://placehold.co/300x200/1e293b/f8fafc?text=Kit+Correia');