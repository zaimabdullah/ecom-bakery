-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 11:55 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productCategoryID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productImage` varchar(200) NOT NULL,
  `productShortDesc` varchar(150) NOT NULL,
  `productLongDesc` varchar(200) NOT NULL,
  `productPrice` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productCategoryID`, `productName`, `productImage`, `productShortDesc`, `productLongDesc`, `productPrice`) VALUES
(1, 2, 'Butter Cookies', 'butter-cookies (2).jpg', 'They are great alongside morning tea or coffee or simply as a snack', 'These cookies are soft inside, almost melting in your mouth, with a bit of crispy texture on the outside, buttery and rich.', 10),
(6, 1, 'Black Forest Cake', 'black-forest-cake-500-g-medium_a4d54ff2dbd7fc7adff1ddd048d91f6e.jpg', 'cherries,\r\nchocolate mousse and triple sec, whip cream frosting and\r\nchocolate crumbles on the sides', 'It is frosted with whipped cream and covered with chocolate shavings and a few cherries for decoration.  ', 22),
(7, 1, 'Red Velvet', 'Red-Velvet-Cake-with-Cream-Cheese-Frosting_landscape.jpg', 'A light German Chocolate chiffon cake with red coloring and our cream cheese filling and frosting.', ' One of our most popular cakes, our red velvet is always moist and dense with a light chocolate flavor. It is perfectly paired when filled  and frosted with our house vanilla buttercream.', 19),
(8, 2, 'Caramel Shortbread', 'Caramel-Shortbread-Bars-4-600x569.jpg', 'delicious', 'Buttery shortbread crust layered with thick, chewy, rich caramel and topped with sea salt for irresistible flavor! ', 12),
(10, 2, 'Macaron Cookies', '20150224__TASTEOFF-03081.jpg', 'The macaron commonly consists of a ganache, buttercream or jam filling sandwiched between two cookies.', 'A macaron is a sweet meringue-based confection made with egg white, icing sugar, granulated sugar, almond powder or ground almond, and food coloring.', 5),
(11, 1, 'Chesse Cake', 'new-york-cheesecake-mhlb2030_horiz.jpg', 'Cheesecake can be prepared in many flavors, such as strawberry, pumpkin, key lime, chocolate, Oreo, chestnut, or toffee.', 'Cheesecake is a sweet dessert consisting of one or more layers. The main, and thickest layer, consists of a mixture of soft, fresh cheese (typically cream cheese or ricotta), eggs, and sugar; if there', 30),
(12, 1, 'Carrot Cake', 'step-by-step-carrot-cake-25853-1.jpeg', 'Carrot Cake- A moist, flavorful, cake with golden raisins, shredded carrots', 'This cake is filled with a cream cheese filling. We also use this same recipe for our morning glory that has a honey glaze on top instead of the frosting, great for breakfast.', 68),
(13, 1, 'Guava Cake ', 'guava_chiffon, cake-guava_chiffon_full.jpg', 'Guava Cake - Chiffon cake infused with guava juice', 'guava/whip cream filling, then topped with guava juice and the sides covered with guava chiffon crumbles, whipped cream frosting and lady fingers placed around the cake.', 150),
(14, 1, 'Tiramisu', 'cheats-tiramisu-cake-94044-1.jpeg', 'Tiramisu - White chiffon cake pieces soaked in coffee syrup, creamy tiramisu filling and chocolate pieces accented with slivers of gourmet chocolate.', ' Tiramisu (tih-ruh-mee-SOO) â€“ The Italian translation for tiramisu is â€œcarry me up.â€  Also known as Tuscan Trifle.  Tradition tiramisu is a pudding-like dessert that usually consists of sponge c', 80),
(15, 2, 'StroopWafel', 'o-STROOPWAFELS-1-facebook.jpg', 'Authentic Verweij 100% butter stroopwalfels', ' This classic Dutch cookie made with 100% real cream butter and a syrupy caramel layer in the middle. For a real treat place a stroopwafel on top of a cup of coffee, tea or hot chocolate and allow the', 8),
(16, 2, 'Christmas Cookies', 'large.jpg', 'Choose from sugar cookies, gingerbread, spritz butter cookies, thumbprints, shortbread, biscotti, and more.', 'The whole family will have a ball transforming sugar cookie dough into charming Christmas characters with our holiday cookie templates, a rainbow of royal icing colors, and a little imagination.', 10),
(17, 2, 'Chocolate Chip Cookies', '18134-five-star-chocolate-chip-cookies-600x600.jpg', 'chocolate-chip cookies are just the right mix of chewy and crisp, with a bittersweet morsel of chocolate in each bite.', 'They are the cookies anyone who asks you to make chocolate chip cookies are asking for -- the kind of chocolate cookie that demands to be dunked into a glass of ice-cold milk.', 5),
(18, 3, 'Bagel', 'ab0c60ca-3724-484a-adeb-bfc3ceca69be_h.jpg', 'WE HAVE CREATED A UNIQUE LA-STYLE BAGEL THAT IS MADE-TO-ORDER ON-SITE WHEREVER WE ARE BOOKED', 'EVERYTHING IS MADE FROM SCRATCH DAILY INCLUDING OUR HOMEMADE CREAM CHEESES AND BUTTERS.  OUR BAGELS ARE LIGHT AND CHEWY YET NEVER DENSE LIKE SOME NY BAGELS CAN BE AND THEY ARE ALWAYS HOT.  WE WANT TO ', 13),
(19, 3, 'Bread Stick', 'landscape-1446653066-delish-thanksgiving-breadstick-toppings.jpg', 'Breadsticks are hearth baked, coated with our robust butter-garlic flavored topping and sprinkled with bits of fresh parsley', 'Our traditional Garlic Bread Sticks are tasty as is or topped with our creamiest Italian cheeses in our 5 Cheese Bread Sticks: Mozzarella, Provolone, Romano, Parmesan and Asiago. Campioine Bread Stick', 7),
(20, 3, 'Crumpet', 'crumpets-72973-1.jpeg', 'A savoury or sweet bread snack made from flour and yeast, flapjacks (also known as crumpets)', 'A savoury or sweet bread snack made from flour and yeast, flapjacks (also known as crumpets) are popular for breakfast or dessert', 25),
(21, 3, 'Pretzel', '5oz_1024x1024.jpg', 'Wow. Youâ€™ve never had a soft Pretzel like this before.', 'Plump, chewy and flavorful with just the right amount of saltâ€”the other soft pretzels youâ€™ve had just canâ€™t compare.', 23),
(22, 4, 'apple cinnamon cupcakes', 'apple-cupcakes-cinnamon-marshmallow-frosting-mdn.JPG', 'Apple Cinnamon Roll Cupcakes are delicious and easy fall dessert.', 'You can enjoy these sweet, gooey dessert with fresh apples and delicous cinnamon sugar', 5),
(23, 4, 'blueberry cupcakes', '6045534856_37616061a1.jpg', 'Blueberry Cupcakes! Topped with homemade Lemon Cream Cheese Frosting and Fresh Blueberries,', 'theyâ€™re simply irresistible. ... The lemon cream cheese frosting is a breeze to whip up and compliments the lemon blueberry cupcakes perfectly.', 7),
(24, 5, 'Chessy garlic pizza', 'chessy garlic piza.jpg', 'Mozzarella ', 'Mozzarella on a garlic crÃ¨me fraiche base topped with oregano', 23),
(25, 6, 'Injera bread', 'Injera bread.jpg', 'In its homeland, the Horn of Africa, this rather tangy, slightly sour flatbread', 'In its homeland, the Horn of Africa, this rather tangy, slightly sour flatbread', 7),
(28, 5, 'Grand italian pizaa', 'grand italian pizza.jpg', 'pizza', 'delicious pizza', 34),
(29, 1, 'pandan cake', 'spicy vegi pizza.jpg', 'aaaa', 'aaaa', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
