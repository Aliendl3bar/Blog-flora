-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 12:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status_public` tinyint(1) DEFAULT 0,
  `date_publication` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `status_public`, `date_publication`, `id_user`, `id_category`, `image_path`) VALUES
(1, 'lilys', 'lilys are beautiful flowers with elegant petals and come in many colors', 1, '2026-03-21', 1, 1, 'lily'),
(2, 'tulips', 'tulips are spring flowers known for their vibrant colors and cup-shaped blooms', 1, '2026-01-05', 8, 1, 'tulip'),
(3, 'peonys', 'peonys are lush, full flowers that bloom in late spring and have a sweet fragrance', 1, '2026-03-27', 1, 1, 'peony\r\n'),
(19, 'The Majestic Sunflower', 'Sunflowers are among the most recognizable flowers in the world, known for their towering stems and radiant golden petals. These impressive plants can grow up to three meters tall in ideal conditions, making them a striking feature in any garden or field. One of the most fascinating characteristics of sunflowers is their heliotropism — young sunflowers actually track the movement of the sun from east to west during the day. The sunflower head is not a single flower but rather a composite of hundreds of tiny florets arranged in a precise spiral pattern. The central disc is surrounded by the iconic yellow ray petals that give the plant its sun-like appearance. Sunflowers are native to North America and were cultivated by Indigenous peoples for thousands of years before spreading to Europe in the 16th century. Beyond their beauty, sunflowers are highly practical plants — their seeds are rich in healthy oils, vitamins, and proteins. Sunflower oil is one of the most widely used cooking oils in the world today. The seeds are also a popular snack and are used in baking and bird feed. Growing sunflowers is relatively easy, as they thrive in full sun with well-drained soil and minimal care.', 1, '2026-02-14', 1, 1, 'sunflower'),
(20, 'Lavender: The Purple Wonder', 'Lavender is one of the most beloved and versatile flowering plants in the world, celebrated for both its visual charm and its remarkable range of uses. Native to the Mediterranean region, lavender thrives in warm, sunny climates with well-drained, slightly alkaline soil. Its slender silvery-green stems are topped with dense spikes of small purple to violet flowers that create breathtaking landscapes when planted en masse. The plant belongs to the mint family and shares that family\'s characteristic aromatic quality, releasing a distinctive floral fragrance that is instantly recognizable. Lavender essential oil is one of the most widely used in aromatherapy, valued for its calming and stress-relieving properties. Scientific studies have supported its effectiveness in reducing anxiety and improving sleep quality. In culinary traditions, particularly in French Provençal cuisine, lavender is used to flavor honey, baked goods, and the famous herbes de Provence spice blend. Bees are strongly attracted to lavender blooms, making it an excellent plant for supporting local pollinator populations. The plant also has a long history in folk medicine, used to treat headaches, insomnia, and minor skin irritations. Dried lavender bundles have been used for centuries to naturally repel moths and freshen linens and closets.', 1, '2026-01-18', 1, 1, 'lavender'),
(21, 'Chrysanthemums: Flowers of a Thousand Faces', 'Chrysanthemums, affectionately called \"mums\" by gardeners and florists alike, are one of the most diverse and culturally significant flowers in existence. Originally cultivated in China over 2,500 years ago, these remarkable flowers spread to Japan where they became a symbol of the imperial family and the nation itself. Today, chrysanthemums are grown in an astonishing variety of forms, ranging from simple daisy-like single blooms to densely packed pompons, elegant spider mums, and dramatic decorative varieties. The petals can be flat, tubular, or quilled, and they come in virtually every color imaginable except true blue. Chrysanthemums bloom naturally in autumn, making them one of the few flowers to bring color and joy to gardens as the days grow shorter and temperatures drop. This seasonal timing has given them symbolic associations with endurance, longevity, and resilience in many Asian cultures. In Japan, the annual Festival of Happiness celebrates the chrysanthemum with elaborate floral displays. These flowers are also among the most important commercial cut flowers globally, second only to roses in terms of worldwide trade volume. Modern horticulture has produced day-length-neutral varieties that can be coaxed into bloom at almost any time of year. Beyond their ornamental value, chrysanthemum tea made from dried flowers is a popular beverage in East Asia, prized for its light floral flavor and purported health benefits.', 1, '2026-03-05', 1, 1, 'Chrysanthemums'),
(22, 'Orchids: Nature\'s Most Sophisticated Flowers', 'Orchids represent the largest family of flowering plants on Earth, with over 25,000 documented species and more than 100,000 hybrids developed through careful cultivation. This extraordinary diversity means that orchids can be found on every continent except Antarctica, adapting to environments as varied as tropical rainforests, high-altitude meadows, and even semi-arid scrublands. What makes orchids truly extraordinary is the breathtaking complexity of their flower structures, which have evolved over millions of years alongside specific pollinators. Some orchid species produce flowers that mimic the appearance, scent, and even the texture of female insects, tricking male insects into attempting to mate with the bloom and inadvertently collecting pollen in the process. The Phalaenopsis, or moth orchid, is the most popular houseplant variety, admired for its elegant arching sprays of long-lasting blooms that can remain fresh for months. Orchids grow in two main ways: epiphytically, meaning they attach themselves to trees and absorb moisture and nutrients from the air and rain, and terrestrially, meaning they grow in soil. Their roots are often silvery-green and photosynthetic, functioning quite differently from the roots of most other plants. Orchid cultivation has inspired passionate collectors and horticulturalists for centuries, a phenomenon historically known as \"orchid fever\" or orchidelirium. In the Victorian era, wealthy collectors sent explorers to remote jungles in search of rare new species. Today, orchids play a significant role in scientific research, particularly in the study of plant evolution and co-evolutionary relationships between flowers and pollinators.', 1, '2026-02-28', 1, 1, 'orchids'),
(23, 'Dahlias: The Queen of the Autumn Garden', 'Dahlias are magnificent flowering plants that produce some of the most spectacular blooms in the botanical world, ranging in size from cheerful two-centimeter pompons to dinner-plate varieties exceeding thirty centimeters across. Native to the highlands of Mexico and Central America, dahlias were first cultivated by Aztec peoples who valued them both as a food source and for their striking appearance. Spanish conquistadors brought dahlia tubers back to Europe in the late 18th century, where they quickly became a sensation among botanists and gardeners. The dahlia genus belongs to the Asteraceae family, which also includes sunflowers and chrysanthemums, and its flowers display the same composite structure of central disc florets surrounded by ray petals. What sets dahlias apart from almost all other flowers is their extraordinary diversity of form — there are over 57,000 registered cultivars divided into 14 official classification groups including cactus, decorative, ball, anemone, and collarette types. Dahlias bloom from midsummer through the first frosts of autumn, filling gardens with color precisely when many spring flowers have faded. They come in virtually every color except true blue and black, including bi-colored and variegated varieties of stunning complexity. Growing dahlias requires planting tubers in warm, well-drained soil after the danger of frost has passed. They reward attentive gardeners with prolific blooms, especially when deadheaded regularly. In many cooler climates, dahlia tubers must be lifted and stored indoors during winter to protect them from freezing temperatures before being replanted the following spring.', 1, '2026-03-19', 1, 1, 'dahlias'),
(24, 'rozes', 'The rose ($Rosa$) is a perennial flowering plant that has served as a powerful cultural symbol for millennia, representing everything from romantic love and beauty to secrecy and war. Belonging to the family Rosaceae, these plants are native primarily to the Northern Hemisphere and are characterized by their thorny stems and fragrant, multi-petaled blooms that appear in a vast spectrum of colors. Beyond their ornamental value in gardens and floral arrangements, roses are highly functional; they are cultivated globally for the production of essential oils in the perfume industry and for rose hips, which are a potent source of Vitamin C used in teas and supplements.', 1, '2026-04-28', 1, 1, 'articles/24/imgs/roze.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_icon`) VALUES
(1, 'Flowers', 'local_florist'),
(2, 'Trees', 'forest'),
(3, 'Indoor Plants', 'potted_plant'),
(4, 'Wild Herbs', 'grass'),
(5, 'Edible', 'nutrition');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `datep` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `NAME`, `email`, `PASSWORD`) VALUES
(1, 'israa', 'israa@gmail.com', '1234'),
(3, 'Hamza', 'hamza.new@gmail.com', ''),
(4, 'ilays', 'ilyas@gmail.com', ''),
(5, 'khawla', 'khawla@gmail.com', ''),
(8, 'aymane', 'salmoune@gmail.com', ''),
(9, 'mohamed', 'mohamed@gmail.com', ''),
(11, 'houda', 'houda@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `tittlex` (`title`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_article` (`id_article`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `namex` (`NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
