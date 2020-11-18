-- --------------------------------------------------------
-- Host:                         localhost
-- Server versie:                5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumpen data van tabel idot.hotels: ~2 rows (ongeveer)
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` (`_links`, `id`, `name`, `address`, `zipcode`, `city`, `images`, `roomtypes`) VALUES
	('{"self": ["http://tst.paradiso.w20e.com/api/v1/hotels/38/"]}', 1, 'Apollo Hotel', 'Laan van de vrijheid 91', '9728 GA Groningen', 'Groningen', '[{"id": "22", "image": [{"value": "", "filename": "", "filetype": ""}], "_links": [""]}]', '[{"id": "260", "name": "Twin/Double Deluxe", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/260/"}]}, {"id": "422", "name": "Twin/Double Standard", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/422/"}]}]'),
	('{"self": ["http://tst.paradiso.w20e.com/api/v1/hotels/65/"]}', 2, 'Hotelship 3', 'Eemskanaal Noordzijde 24', '9713 AA', 'Groningen', '[{"id": "41", "image": [{"value": "", "filename": "", "filetype": ""}], "_links": [""]}]', '[{"id": "363", "name": "Prestige Balcony room HS3", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/363/"}]}, {"id": "362", "name": "Prestige room HS3", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/362/"}]}]'),
	('{"self": ["http://tst.paradiso.w20e.com/api/v1/hotels/66/"]}', 3, 'Hotelship 5', 'Eemskanaal Noordzijde 24', '9713 AA', 'Groningen', '[{"id": "42", "image": [{"value": "", "filename": "", "filetype": ""}], "_links": [""]}]', '[{"id": "367", "name": "Master suite HS5", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/367/"}]}, {"id": "368", "name": "Mini suite HS5", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/368/"}]}, {"id": "369", "name": "Prestige Balcony room HS5", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/369/"}]}, {"id": "370", "name": "Prestige room HS5", "_links": [{"self": "http://tst.paradiso.w20e.com/api/v1/roomtypes/370/"}]}]');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
