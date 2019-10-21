-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 07:06 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(7) NOT NULL,
  `productId` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `price` int(7) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `descripition` varchar(100) NOT NULL,
  `sellerId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productId`, `quantity`, `userId`, `price`, `productName`, `descripition`, `sellerId`) VALUES
(1, 22, 2, 'riyad298@gmail.com', 100, 'fghfg', '', '0'),
(2, 23, 1, 'riyad298@gmail.com', 200, 'gfhfh', '', '0'),
(3, 24, 4, 'makaium33@gmail.com', 300, 'kjhhjh', '', '0'),
(4, 25, 6, 'makaium33@gmail.com', 400, 'jkhjkh', '', '0'),
(5, 1, 3, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', '0'),
(6, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', '0'),
(7, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(8, 7, 1, 'riyad298@gmail.com', 344, 'popo', '345', ''),
(9, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(10, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(11, 1, 4, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(12, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(13, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(14, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(15, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(16, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(17, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(18, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(19, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(20, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(21, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(22, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(23, 7, 1, 'riyad298@gmail.com', 344, 'popo', '345', ''),
(24, 7, 1, 'riyad298@gmail.com', 344, 'popo', '345', ''),
(25, 7, 1, 'riyad298@gmail.com', 344, 'popo', '345', ''),
(26, 7, 1, 'riyad298@gmail.com', 344, 'popo', '345', ''),
(27, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(28, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(29, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(30, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(31, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', '');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `id` int(7) NOT NULL,
  `orderId` int(5) NOT NULL,
  `productId` int(50) NOT NULL,
  `perProductQuantity` int(50) NOT NULL,
  `sellerId` varchar(50) NOT NULL,
  `userId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`id`, `orderId`, `productId`, `perProductQuantity`, `sellerId`, `userId`) VALUES
(610, 126, 22, 2, '0', 'riyad298@gmail.com'),
(611, 126, 23, 1, '0', 'riyad298@gmail.com'),
(612, 126, 1, 3, '0', 'riyad298@gmail.com'),
(613, 126, 1, 1, '0', 'riyad298@gmail.com'),
(614, 126, 1, 1, '', 'riyad298@gmail.com'),
(615, 126, 7, 1, '', 'riyad298@gmail.com'),
(616, 126, 1, 1, '', 'riyad298@gmail.com'),
(617, 126, 1, 1, '', 'riyad298@gmail.com'),
(618, 126, 1, 4, '', 'riyad298@gmail.com'),
(619, 126, 1, 1, '', 'riyad298@gmail.com'),
(620, 126, 1, 1, '', 'riyad298@gmail.com'),
(621, 126, 1, 1, '', 'riyad298@gmail.com'),
(622, 126, 1, 1, '', 'riyad298@gmail.com'),
(623, 126, 1, 1, '', 'riyad298@gmail.com'),
(624, 126, 1, 1, '', 'riyad298@gmail.com'),
(625, 126, 1, 1, '', 'riyad298@gmail.com'),
(626, 126, 1, 1, '', 'riyad298@gmail.com'),
(627, 126, 1, 1, '', 'riyad298@gmail.com'),
(628, 126, 1, 1, '', 'riyad298@gmail.com'),
(629, 126, 1, 1, '', 'riyad298@gmail.com'),
(630, 126, 7, 1, '', 'riyad298@gmail.com'),
(631, 126, 7, 1, '', 'riyad298@gmail.com'),
(632, 126, 7, 1, '', 'riyad298@gmail.com'),
(633, 126, 7, 1, '', 'riyad298@gmail.com'),
(634, 126, 1, 1, '', 'riyad298@gmail.com'),
(635, 126, 1, 1, '', 'riyad298@gmail.com'),
(636, 126, 1, 1, '', 'riyad298@gmail.com'),
(637, 127, 22, 2, '0', 'riyad298@gmail.com'),
(638, 127, 23, 1, '0', 'riyad298@gmail.com'),
(639, 127, 1, 3, '0', 'riyad298@gmail.com'),
(640, 127, 1, 1, '0', 'riyad298@gmail.com'),
(641, 127, 1, 1, '', 'riyad298@gmail.com'),
(642, 127, 7, 1, '', 'riyad298@gmail.com'),
(643, 127, 1, 1, '', 'riyad298@gmail.com'),
(644, 127, 1, 1, '', 'riyad298@gmail.com'),
(645, 127, 1, 4, '', 'riyad298@gmail.com'),
(646, 127, 1, 1, '', 'riyad298@gmail.com'),
(647, 127, 1, 1, '', 'riyad298@gmail.com'),
(648, 127, 1, 1, '', 'riyad298@gmail.com'),
(649, 127, 1, 1, '', 'riyad298@gmail.com'),
(650, 127, 1, 1, '', 'riyad298@gmail.com'),
(651, 127, 1, 1, '', 'riyad298@gmail.com'),
(652, 127, 1, 1, '', 'riyad298@gmail.com'),
(653, 127, 1, 1, '', 'riyad298@gmail.com'),
(654, 127, 1, 1, '', 'riyad298@gmail.com'),
(655, 127, 1, 1, '', 'riyad298@gmail.com'),
(656, 127, 1, 1, '', 'riyad298@gmail.com'),
(657, 127, 7, 1, '', 'riyad298@gmail.com'),
(658, 127, 7, 1, '', 'riyad298@gmail.com'),
(659, 127, 7, 1, '', 'riyad298@gmail.com'),
(660, 127, 7, 1, '', 'riyad298@gmail.com'),
(661, 127, 1, 1, '', 'riyad298@gmail.com'),
(662, 127, 1, 1, '', 'riyad298@gmail.com'),
(663, 127, 1, 1, '', 'riyad298@gmail.com'),
(664, 128, 22, 2, '0', 'riyad298@gmail.com'),
(665, 128, 23, 1, '0', 'riyad298@gmail.com'),
(666, 128, 1, 3, '0', 'riyad298@gmail.com'),
(667, 128, 1, 1, '0', 'riyad298@gmail.com'),
(668, 128, 1, 1, '', 'riyad298@gmail.com'),
(669, 128, 7, 1, '', 'riyad298@gmail.com'),
(670, 128, 1, 1, '', 'riyad298@gmail.com'),
(671, 128, 1, 1, '', 'riyad298@gmail.com'),
(672, 128, 1, 4, '', 'riyad298@gmail.com'),
(673, 128, 1, 1, '', 'riyad298@gmail.com'),
(674, 128, 1, 1, '', 'riyad298@gmail.com'),
(675, 128, 1, 1, '', 'riyad298@gmail.com'),
(676, 128, 1, 1, '', 'riyad298@gmail.com'),
(677, 128, 1, 1, '', 'riyad298@gmail.com'),
(678, 128, 1, 1, '', 'riyad298@gmail.com'),
(679, 128, 1, 1, '', 'riyad298@gmail.com'),
(680, 128, 1, 1, '', 'riyad298@gmail.com'),
(681, 128, 1, 1, '', 'riyad298@gmail.com'),
(682, 128, 1, 1, '', 'riyad298@gmail.com'),
(683, 128, 1, 1, '', 'riyad298@gmail.com'),
(684, 128, 7, 1, '', 'riyad298@gmail.com'),
(685, 128, 7, 1, '', 'riyad298@gmail.com'),
(686, 128, 7, 1, '', 'riyad298@gmail.com'),
(687, 128, 7, 1, '', 'riyad298@gmail.com'),
(688, 128, 1, 1, '', 'riyad298@gmail.com'),
(689, 128, 1, 1, '', 'riyad298@gmail.com'),
(690, 128, 1, 1, '', 'riyad298@gmail.com'),
(691, 129, 22, 2, '0', 'riyad298@gmail.com'),
(692, 129, 23, 1, '0', 'riyad298@gmail.com'),
(693, 129, 1, 3, '0', 'riyad298@gmail.com'),
(694, 129, 1, 1, '0', 'riyad298@gmail.com'),
(695, 129, 1, 1, '', 'riyad298@gmail.com'),
(696, 129, 7, 1, '', 'riyad298@gmail.com'),
(697, 129, 1, 1, '', 'riyad298@gmail.com'),
(698, 129, 1, 1, '', 'riyad298@gmail.com'),
(699, 129, 1, 4, '', 'riyad298@gmail.com'),
(700, 129, 1, 1, '', 'riyad298@gmail.com'),
(701, 129, 1, 1, '', 'riyad298@gmail.com'),
(702, 129, 1, 1, '', 'riyad298@gmail.com'),
(703, 129, 1, 1, '', 'riyad298@gmail.com'),
(704, 129, 1, 1, '', 'riyad298@gmail.com'),
(705, 129, 1, 1, '', 'riyad298@gmail.com'),
(706, 129, 1, 1, '', 'riyad298@gmail.com'),
(707, 129, 1, 1, '', 'riyad298@gmail.com'),
(708, 129, 1, 1, '', 'riyad298@gmail.com'),
(709, 129, 1, 1, '', 'riyad298@gmail.com'),
(710, 129, 1, 1, '', 'riyad298@gmail.com'),
(711, 129, 7, 1, '', 'riyad298@gmail.com'),
(712, 129, 7, 1, '', 'riyad298@gmail.com'),
(713, 129, 7, 1, '', 'riyad298@gmail.com'),
(714, 129, 7, 1, '', 'riyad298@gmail.com'),
(715, 129, 1, 1, '', 'riyad298@gmail.com'),
(716, 129, 1, 1, '', 'riyad298@gmail.com'),
(717, 129, 1, 1, '', 'riyad298@gmail.com'),
(718, 129, 1, 1, '', 'riyad298@gmail.com'),
(719, 130, 22, 2, '0', 'riyad298@gmail.com'),
(720, 130, 23, 1, '0', 'riyad298@gmail.com'),
(721, 130, 1, 3, '0', 'riyad298@gmail.com'),
(722, 130, 1, 1, '0', 'riyad298@gmail.com'),
(723, 130, 1, 1, '', 'riyad298@gmail.com'),
(724, 130, 7, 1, '', 'riyad298@gmail.com'),
(725, 130, 1, 1, '', 'riyad298@gmail.com'),
(726, 130, 1, 1, '', 'riyad298@gmail.com'),
(727, 130, 1, 4, '', 'riyad298@gmail.com'),
(728, 130, 1, 1, '', 'riyad298@gmail.com'),
(729, 130, 1, 1, '', 'riyad298@gmail.com'),
(730, 130, 1, 1, '', 'riyad298@gmail.com'),
(731, 130, 1, 1, '', 'riyad298@gmail.com'),
(732, 130, 1, 1, '', 'riyad298@gmail.com'),
(733, 130, 1, 1, '', 'riyad298@gmail.com'),
(734, 130, 1, 1, '', 'riyad298@gmail.com'),
(735, 130, 1, 1, '', 'riyad298@gmail.com'),
(736, 130, 1, 1, '', 'riyad298@gmail.com'),
(737, 130, 1, 1, '', 'riyad298@gmail.com'),
(738, 130, 1, 1, '', 'riyad298@gmail.com'),
(739, 130, 7, 1, '', 'riyad298@gmail.com'),
(740, 130, 7, 1, '', 'riyad298@gmail.com'),
(741, 130, 7, 1, '', 'riyad298@gmail.com'),
(742, 130, 7, 1, '', 'riyad298@gmail.com'),
(743, 130, 1, 1, '', 'riyad298@gmail.com'),
(744, 130, 1, 1, '', 'riyad298@gmail.com'),
(745, 130, 1, 1, '', 'riyad298@gmail.com'),
(746, 130, 1, 1, '', 'riyad298@gmail.com'),
(747, 131, 22, 2, '0', 'riyad298@gmail.com'),
(748, 131, 23, 1, '0', 'riyad298@gmail.com'),
(749, 131, 1, 3, '0', 'riyad298@gmail.com'),
(750, 131, 1, 1, '0', 'riyad298@gmail.com'),
(751, 131, 1, 1, '', 'riyad298@gmail.com'),
(752, 131, 7, 1, '', 'riyad298@gmail.com'),
(753, 131, 1, 1, '', 'riyad298@gmail.com'),
(754, 131, 1, 1, '', 'riyad298@gmail.com'),
(755, 131, 1, 4, '', 'riyad298@gmail.com'),
(756, 131, 1, 1, '', 'riyad298@gmail.com'),
(757, 131, 1, 1, '', 'riyad298@gmail.com'),
(758, 131, 1, 1, '', 'riyad298@gmail.com'),
(759, 131, 1, 1, '', 'riyad298@gmail.com'),
(760, 131, 1, 1, '', 'riyad298@gmail.com'),
(761, 131, 1, 1, '', 'riyad298@gmail.com'),
(762, 131, 1, 1, '', 'riyad298@gmail.com'),
(763, 131, 1, 1, '', 'riyad298@gmail.com'),
(764, 131, 1, 1, '', 'riyad298@gmail.com'),
(765, 131, 1, 1, '', 'riyad298@gmail.com'),
(766, 131, 1, 1, '', 'riyad298@gmail.com'),
(767, 131, 7, 1, '', 'riyad298@gmail.com'),
(768, 131, 7, 1, '', 'riyad298@gmail.com'),
(769, 131, 7, 1, '', 'riyad298@gmail.com'),
(770, 131, 7, 1, '', 'riyad298@gmail.com'),
(771, 131, 1, 1, '', 'riyad298@gmail.com'),
(772, 131, 1, 1, '', 'riyad298@gmail.com'),
(773, 131, 1, 1, '', 'riyad298@gmail.com'),
(774, 131, 1, 1, '', 'riyad298@gmail.com'),
(775, 132, 22, 2, '0', 'riyad298@gmail.com'),
(776, 132, 23, 1, '0', 'riyad298@gmail.com'),
(777, 132, 1, 3, '0', 'riyad298@gmail.com'),
(778, 132, 1, 1, '0', 'riyad298@gmail.com'),
(779, 132, 1, 1, '', 'riyad298@gmail.com'),
(780, 132, 7, 1, '', 'riyad298@gmail.com'),
(781, 132, 1, 1, '', 'riyad298@gmail.com'),
(782, 132, 1, 1, '', 'riyad298@gmail.com'),
(783, 132, 1, 4, '', 'riyad298@gmail.com'),
(784, 132, 1, 1, '', 'riyad298@gmail.com'),
(785, 132, 1, 1, '', 'riyad298@gmail.com'),
(786, 132, 1, 1, '', 'riyad298@gmail.com'),
(787, 132, 1, 1, '', 'riyad298@gmail.com'),
(788, 132, 1, 1, '', 'riyad298@gmail.com'),
(789, 132, 1, 1, '', 'riyad298@gmail.com'),
(790, 132, 1, 1, '', 'riyad298@gmail.com'),
(791, 132, 1, 1, '', 'riyad298@gmail.com'),
(792, 132, 1, 1, '', 'riyad298@gmail.com'),
(793, 132, 1, 1, '', 'riyad298@gmail.com'),
(794, 132, 1, 1, '', 'riyad298@gmail.com'),
(795, 132, 7, 1, '', 'riyad298@gmail.com'),
(796, 132, 7, 1, '', 'riyad298@gmail.com'),
(797, 132, 7, 1, '', 'riyad298@gmail.com'),
(798, 132, 7, 1, '', 'riyad298@gmail.com'),
(799, 132, 1, 1, '', 'riyad298@gmail.com'),
(800, 132, 1, 1, '', 'riyad298@gmail.com'),
(801, 132, 1, 1, '', 'riyad298@gmail.com'),
(802, 132, 1, 1, '', 'riyad298@gmail.com'),
(803, 133, 22, 2, '0', 'riyad298@gmail.com'),
(804, 133, 23, 1, '0', 'riyad298@gmail.com'),
(805, 133, 1, 3, '0', 'riyad298@gmail.com'),
(806, 133, 1, 1, '0', 'riyad298@gmail.com'),
(807, 133, 1, 1, '', 'riyad298@gmail.com'),
(808, 133, 7, 1, '', 'riyad298@gmail.com'),
(809, 133, 1, 1, '', 'riyad298@gmail.com'),
(810, 133, 1, 1, '', 'riyad298@gmail.com'),
(811, 133, 1, 4, '', 'riyad298@gmail.com'),
(812, 133, 1, 1, '', 'riyad298@gmail.com'),
(813, 133, 1, 1, '', 'riyad298@gmail.com'),
(814, 133, 1, 1, '', 'riyad298@gmail.com'),
(815, 133, 1, 1, '', 'riyad298@gmail.com'),
(816, 133, 1, 1, '', 'riyad298@gmail.com'),
(817, 133, 1, 1, '', 'riyad298@gmail.com'),
(818, 133, 1, 1, '', 'riyad298@gmail.com'),
(819, 133, 1, 1, '', 'riyad298@gmail.com'),
(820, 133, 1, 1, '', 'riyad298@gmail.com'),
(821, 133, 1, 1, '', 'riyad298@gmail.com'),
(822, 133, 1, 1, '', 'riyad298@gmail.com'),
(823, 133, 7, 1, '', 'riyad298@gmail.com'),
(824, 133, 7, 1, '', 'riyad298@gmail.com'),
(825, 133, 7, 1, '', 'riyad298@gmail.com'),
(826, 133, 7, 1, '', 'riyad298@gmail.com'),
(827, 133, 1, 1, '', 'riyad298@gmail.com'),
(828, 133, 1, 1, '', 'riyad298@gmail.com'),
(829, 133, 1, 1, '', 'riyad298@gmail.com'),
(830, 133, 1, 1, '', 'riyad298@gmail.com'),
(831, 134, 22, 2, '0', 'riyad298@gmail.com'),
(832, 134, 23, 1, '0', 'riyad298@gmail.com'),
(833, 134, 1, 3, '0', 'riyad298@gmail.com'),
(834, 134, 1, 1, '0', 'riyad298@gmail.com'),
(835, 134, 1, 1, '', 'riyad298@gmail.com'),
(836, 134, 7, 1, '', 'riyad298@gmail.com'),
(837, 134, 1, 1, '', 'riyad298@gmail.com'),
(838, 134, 1, 1, '', 'riyad298@gmail.com'),
(839, 134, 1, 4, '', 'riyad298@gmail.com'),
(840, 134, 1, 1, '', 'riyad298@gmail.com'),
(841, 134, 1, 1, '', 'riyad298@gmail.com'),
(842, 134, 1, 1, '', 'riyad298@gmail.com'),
(843, 134, 1, 1, '', 'riyad298@gmail.com'),
(844, 134, 1, 1, '', 'riyad298@gmail.com'),
(845, 134, 1, 1, '', 'riyad298@gmail.com'),
(846, 134, 1, 1, '', 'riyad298@gmail.com'),
(847, 134, 1, 1, '', 'riyad298@gmail.com'),
(848, 134, 1, 1, '', 'riyad298@gmail.com'),
(849, 134, 1, 1, '', 'riyad298@gmail.com'),
(850, 134, 1, 1, '', 'riyad298@gmail.com'),
(851, 134, 7, 1, '', 'riyad298@gmail.com'),
(852, 134, 7, 1, '', 'riyad298@gmail.com'),
(853, 134, 7, 1, '', 'riyad298@gmail.com'),
(854, 134, 7, 1, '', 'riyad298@gmail.com'),
(855, 134, 1, 1, '', 'riyad298@gmail.com'),
(856, 134, 1, 1, '', 'riyad298@gmail.com'),
(857, 134, 1, 1, '', 'riyad298@gmail.com'),
(858, 134, 1, 1, '', 'riyad298@gmail.com'),
(859, 135, 22, 2, '0', 'riyad298@gmail.com'),
(860, 135, 23, 1, '0', 'riyad298@gmail.com'),
(861, 135, 1, 3, '0', 'riyad298@gmail.com'),
(862, 135, 1, 1, '0', 'riyad298@gmail.com'),
(863, 135, 1, 1, '', 'riyad298@gmail.com'),
(864, 135, 7, 1, '', 'riyad298@gmail.com'),
(865, 135, 1, 1, '', 'riyad298@gmail.com'),
(866, 135, 1, 1, '', 'riyad298@gmail.com'),
(867, 135, 1, 4, '', 'riyad298@gmail.com'),
(868, 135, 1, 1, '', 'riyad298@gmail.com'),
(869, 135, 1, 1, '', 'riyad298@gmail.com'),
(870, 135, 1, 1, '', 'riyad298@gmail.com'),
(871, 135, 1, 1, '', 'riyad298@gmail.com'),
(872, 135, 1, 1, '', 'riyad298@gmail.com'),
(873, 135, 1, 1, '', 'riyad298@gmail.com'),
(874, 135, 1, 1, '', 'riyad298@gmail.com'),
(875, 135, 1, 1, '', 'riyad298@gmail.com'),
(876, 135, 1, 1, '', 'riyad298@gmail.com'),
(877, 135, 1, 1, '', 'riyad298@gmail.com'),
(878, 135, 1, 1, '', 'riyad298@gmail.com'),
(879, 135, 7, 1, '', 'riyad298@gmail.com'),
(880, 135, 7, 1, '', 'riyad298@gmail.com'),
(881, 135, 7, 1, '', 'riyad298@gmail.com'),
(882, 135, 7, 1, '', 'riyad298@gmail.com'),
(883, 135, 1, 1, '', 'riyad298@gmail.com'),
(884, 135, 1, 1, '', 'riyad298@gmail.com'),
(885, 135, 1, 1, '', 'riyad298@gmail.com'),
(886, 135, 1, 1, '', 'riyad298@gmail.com'),
(887, 135, 1, 1, '', 'riyad298@gmail.com'),
(888, 136, 22, 2, '0', 'riyad298@gmail.com'),
(889, 136, 23, 1, '0', 'riyad298@gmail.com'),
(890, 136, 1, 3, '0', 'riyad298@gmail.com'),
(891, 136, 1, 1, '0', 'riyad298@gmail.com'),
(892, 136, 1, 1, '', 'riyad298@gmail.com'),
(893, 136, 7, 1, '', 'riyad298@gmail.com'),
(894, 136, 1, 1, '', 'riyad298@gmail.com'),
(895, 136, 1, 1, '', 'riyad298@gmail.com'),
(896, 136, 1, 4, '', 'riyad298@gmail.com'),
(897, 136, 1, 1, '', 'riyad298@gmail.com'),
(898, 136, 1, 1, '', 'riyad298@gmail.com'),
(899, 136, 1, 1, '', 'riyad298@gmail.com'),
(900, 136, 1, 1, '', 'riyad298@gmail.com'),
(901, 136, 1, 1, '', 'riyad298@gmail.com'),
(902, 136, 1, 1, '', 'riyad298@gmail.com'),
(903, 136, 1, 1, '', 'riyad298@gmail.com'),
(904, 136, 1, 1, '', 'riyad298@gmail.com'),
(905, 136, 1, 1, '', 'riyad298@gmail.com'),
(906, 136, 1, 1, '', 'riyad298@gmail.com'),
(907, 136, 1, 1, '', 'riyad298@gmail.com'),
(908, 136, 7, 1, '', 'riyad298@gmail.com'),
(909, 136, 7, 1, '', 'riyad298@gmail.com'),
(910, 136, 7, 1, '', 'riyad298@gmail.com'),
(911, 136, 7, 1, '', 'riyad298@gmail.com'),
(912, 136, 1, 1, '', 'riyad298@gmail.com'),
(913, 136, 1, 1, '', 'riyad298@gmail.com'),
(914, 136, 1, 1, '', 'riyad298@gmail.com'),
(915, 136, 1, 1, '', 'riyad298@gmail.com'),
(916, 136, 1, 1, '', 'riyad298@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `orderId` int(5) NOT NULL,
  `orderDate` datetime(6) NOT NULL,
  `orderStatus` varchar(50) NOT NULL,
  `userId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`orderId`, `orderDate`, `orderStatus`, `userId`) VALUES
(1, '2018-12-16 21:32:20.000000', 'pending', 'riyad298@gmail.com'),
(2, '2018-12-16 21:33:13.000000', 'pending', 'riyad298@gmail.com'),
(3, '2018-12-16 21:33:35.000000', 'pending', 'riyad298@gmail.com'),
(4, '2018-12-16 21:43:23.000000', 'pending', 'riyad298@gmail.com'),
(5, '2018-12-16 21:43:59.000000', 'pending', 'riyad298@gmail.com'),
(6, '2018-12-16 21:44:26.000000', 'pending', 'riyad298@gmail.com'),
(7, '2018-12-16 21:44:47.000000', 'pending', 'riyad298@gmail.com'),
(8, '2018-12-16 21:44:55.000000', 'pending', 'riyad298@gmail.com'),
(9, '2018-12-16 21:45:26.000000', 'pending', 'riyad298@gmail.com'),
(10, '2018-12-16 21:45:27.000000', 'pending', 'riyad298@gmail.com'),
(11, '2018-12-16 21:46:05.000000', 'pending', 'riyad298@gmail.com'),
(12, '2018-12-16 21:46:34.000000', 'pending', 'riyad298@gmail.com'),
(13, '2018-12-16 21:46:36.000000', 'pending', 'riyad298@gmail.com'),
(14, '2018-12-16 21:46:37.000000', 'pending', 'riyad298@gmail.com'),
(15, '2018-12-16 21:46:49.000000', 'pending', 'riyad298@gmail.com'),
(16, '2018-12-16 21:46:51.000000', 'pending', 'riyad298@gmail.com'),
(17, '2018-12-16 21:47:02.000000', 'pending', 'riyad298@gmail.com'),
(18, '2018-12-16 21:47:40.000000', 'pending', 'riyad298@gmail.com'),
(19, '2018-12-16 21:47:58.000000', 'pending', 'riyad298@gmail.com'),
(20, '2018-12-16 21:48:08.000000', 'pending', 'riyad298@gmail.com'),
(21, '2018-12-16 21:48:10.000000', 'pending', 'riyad298@gmail.com'),
(22, '2018-12-16 21:49:34.000000', 'pending', 'riyad298@gmail.com'),
(23, '2018-12-16 21:49:39.000000', 'pending', 'riyad298@gmail.com'),
(24, '2018-12-16 21:51:12.000000', 'pending', 'riyad298@gmail.com'),
(25, '2018-12-16 21:53:24.000000', 'pending', 'riyad298@gmail.com'),
(26, '2018-12-16 21:53:28.000000', 'pending', 'riyad298@gmail.com'),
(27, '2018-12-16 21:53:29.000000', 'pending', 'riyad298@gmail.com'),
(28, '2018-12-16 21:54:02.000000', 'pending', 'riyad298@gmail.com'),
(29, '2018-12-16 21:54:24.000000', 'pending', 'riyad298@gmail.com'),
(30, '2018-12-16 21:56:08.000000', 'pending', 'riyad298@gmail.com'),
(31, '2018-12-16 21:57:56.000000', 'pending', 'riyad298@gmail.com'),
(32, '2018-12-16 21:58:33.000000', 'pending', 'riyad298@gmail.com'),
(33, '2018-12-16 21:58:59.000000', 'pending', 'riyad298@gmail.com'),
(34, '2018-12-16 22:00:39.000000', 'pending', 'riyad298@gmail.com'),
(35, '2018-12-16 22:02:13.000000', 'pending', 'riyad298@gmail.com'),
(36, '2018-12-16 22:03:32.000000', 'pending', 'riyad298@gmail.com'),
(37, '2018-12-16 22:05:03.000000', 'pending', 'riyad298@gmail.com'),
(38, '2018-12-16 22:10:59.000000', 'pending', 'riyad298@gmail.com'),
(39, '2018-12-16 22:11:21.000000', 'pending', 'riyad298@gmail.com'),
(40, '2018-12-16 22:17:00.000000', 'pending', 'riyad298@gmail.com'),
(41, '2018-12-16 22:17:51.000000', 'pending', 'riyad298@gmail.com'),
(42, '2018-12-16 22:17:51.000000', 'pending', 'riyad298@gmail.com'),
(43, '2018-12-16 22:18:01.000000', 'pending', 'riyad298@gmail.com'),
(44, '2018-12-16 22:18:01.000000', 'pending', 'riyad298@gmail.com'),
(45, '2018-12-16 22:18:01.000000', 'pending', 'riyad298@gmail.com'),
(46, '2018-12-16 22:18:01.000000', 'pending', 'riyad298@gmail.com'),
(47, '2018-12-16 22:18:26.000000', 'pending', 'riyad298@gmail.com'),
(48, '2018-12-16 22:18:26.000000', 'pending', 'riyad298@gmail.com'),
(49, '2018-12-16 22:18:39.000000', 'pending', 'riyad298@gmail.com'),
(50, '2018-12-16 22:18:39.000000', 'pending', 'riyad298@gmail.com'),
(51, '2018-12-16 22:20:16.000000', 'pending', 'riyad298@gmail.com'),
(52, '2018-12-16 22:26:55.000000', 'pending', 'riyad298@gmail.com'),
(53, '2018-12-16 22:27:31.000000', 'pending', 'riyad298@gmail.com'),
(54, '2018-12-16 22:27:32.000000', 'pending', 'riyad298@gmail.com'),
(55, '2018-12-16 22:27:37.000000', 'pending', 'riyad298@gmail.com'),
(56, '2018-12-16 22:27:52.000000', 'pending', 'riyad298@gmail.com'),
(57, '2018-12-16 22:28:22.000000', 'pending', 'riyad298@gmail.com'),
(58, '2018-12-16 22:29:18.000000', 'pending', 'riyad298@gmail.com'),
(59, '2018-12-16 22:30:40.000000', 'pending', 'riyad298@gmail.com'),
(60, '2018-12-16 22:31:15.000000', 'pending', 'riyad298@gmail.com'),
(61, '2018-12-16 22:31:51.000000', 'pending', 'riyad298@gmail.com'),
(62, '2018-12-16 22:34:42.000000', 'pending', 'riyad298@gmail.com'),
(63, '2018-12-16 22:35:47.000000', 'pending', 'riyad298@gmail.com'),
(64, '2018-12-16 22:35:50.000000', 'pending', 'riyad298@gmail.com'),
(65, '2018-12-16 22:36:15.000000', 'pending', 'riyad298@gmail.com'),
(66, '2018-12-16 22:36:28.000000', 'pending', 'riyad298@gmail.com'),
(67, '2018-12-16 22:36:56.000000', 'pending', 'riyad298@gmail.com'),
(68, '2018-12-16 22:37:44.000000', 'pending', 'riyad298@gmail.com'),
(69, '2018-12-16 22:38:22.000000', 'pending', 'riyad298@gmail.com'),
(70, '2018-12-16 22:38:55.000000', 'pending', 'riyad298@gmail.com'),
(71, '2018-12-16 22:39:18.000000', 'pending', 'riyad298@gmail.com'),
(72, '2018-12-16 22:40:06.000000', 'pending', 'riyad298@gmail.com'),
(73, '2018-12-16 22:40:08.000000', 'pending', 'riyad298@gmail.com'),
(74, '2018-12-16 22:40:08.000000', 'pending', 'riyad298@gmail.com'),
(75, '2018-12-16 22:40:40.000000', 'pending', 'riyad298@gmail.com'),
(76, '2018-12-16 22:41:18.000000', 'pending', 'riyad298@gmail.com'),
(77, '2018-12-16 22:41:19.000000', 'pending', 'riyad298@gmail.com'),
(78, '2018-12-16 22:41:20.000000', 'pending', 'riyad298@gmail.com'),
(79, '2018-12-16 22:41:20.000000', 'pending', 'riyad298@gmail.com'),
(80, '2018-12-16 22:41:20.000000', 'pending', 'riyad298@gmail.com'),
(81, '2018-12-16 22:42:38.000000', 'pending', 'riyad298@gmail.com'),
(82, '2018-12-16 22:43:20.000000', 'pending', 'riyad298@gmail.com'),
(83, '2018-12-16 22:44:04.000000', 'pending', 'riyad298@gmail.com'),
(84, '2018-12-16 22:44:07.000000', 'pending', 'riyad298@gmail.com'),
(85, '2018-12-16 22:44:56.000000', 'pending', 'riyad298@gmail.com'),
(86, '2018-12-16 22:45:02.000000', 'pending', 'riyad298@gmail.com'),
(87, '2018-12-16 22:49:07.000000', 'pending', 'riyad298@gmail.com'),
(88, '2018-12-17 04:12:35.000000', 'pending', 'riyad298@gmail.com'),
(89, '2018-12-17 04:19:55.000000', 'pending', 'riyad298@gmail.com'),
(90, '2018-12-17 04:20:00.000000', 'pending', 'riyad298@gmail.com'),
(91, '2018-12-17 05:10:51.000000', 'pending', 'riyad298@gmail.com'),
(92, '2018-12-17 05:29:07.000000', 'pending', 'riyad298@gmail.com'),
(93, '2018-12-17 05:41:04.000000', 'pending', 'riyad298@gmail.com'),
(94, '2018-12-17 05:42:56.000000', 'pending', 'riyad298@gmail.com'),
(95, '2018-12-17 05:44:49.000000', 'pending', 'riyad298@gmail.com'),
(96, '2018-12-17 05:47:37.000000', 'pending', 'riyad298@gmail.com'),
(97, '2018-12-17 05:48:52.000000', 'pending', 'riyad298@gmail.com'),
(98, '2018-12-17 05:49:04.000000', 'pending', 'riyad298@gmail.com'),
(99, '2018-12-17 05:50:43.000000', 'pending', 'riyad298@gmail.com'),
(100, '2018-12-17 05:50:49.000000', 'pending', 'riyad298@gmail.com'),
(101, '2018-12-17 05:52:00.000000', 'pending', 'riyad298@gmail.com'),
(102, '2018-12-17 05:56:11.000000', 'pending', 'riyad298@gmail.com'),
(103, '2018-12-17 05:56:37.000000', 'pending', 'riyad298@gmail.com'),
(104, '2018-12-17 06:03:20.000000', 'pending', 'riyad298@gmail.com'),
(105, '2018-12-17 06:03:45.000000', 'pending', 'riyad298@gmail.com'),
(106, '2018-12-17 06:03:54.000000', 'pending', 'riyad298@gmail.com'),
(107, '2018-12-17 06:03:56.000000', 'pending', 'riyad298@gmail.com'),
(108, '2018-12-17 06:04:30.000000', 'pending', 'riyad298@gmail.com'),
(109, '2018-12-17 06:04:31.000000', 'pending', 'riyad298@gmail.com'),
(110, '2018-12-17 06:04:32.000000', 'pending', 'riyad298@gmail.com'),
(111, '2018-12-17 06:04:33.000000', 'pending', 'riyad298@gmail.com'),
(112, '2018-12-17 06:04:36.000000', 'pending', 'riyad298@gmail.com'),
(113, '2018-12-17 06:04:37.000000', 'pending', 'riyad298@gmail.com'),
(114, '2018-12-17 06:04:54.000000', 'pending', 'riyad298@gmail.com'),
(115, '2018-12-17 06:05:05.000000', 'pending', 'riyad298@gmail.com'),
(116, '2018-12-17 06:05:09.000000', 'pending', 'riyad298@gmail.com'),
(117, '2018-12-17 06:18:20.000000', 'pending', 'riyad298@gmail.com'),
(118, '2018-12-17 06:18:24.000000', 'pending', 'riyad298@gmail.com'),
(119, '2018-12-17 06:24:47.000000', 'pending', 'riyad298@gmail.com'),
(120, '2018-12-17 06:26:52.000000', 'pending', 'riyad298@gmail.com'),
(121, '2018-12-17 06:31:10.000000', 'pending', 'riyad298@gmail.com'),
(122, '2018-12-17 06:31:15.000000', 'pending', 'riyad298@gmail.com'),
(123, '2018-12-17 06:31:42.000000', 'pending', 'riyad298@gmail.com'),
(124, '2018-12-17 06:34:21.000000', 'pending', 'riyad298@gmail.com'),
(125, '2018-12-17 06:35:07.000000', 'pending', 'riyad298@gmail.com'),
(126, '2018-12-17 06:41:21.000000', 'pending', 'riyad298@gmail.com'),
(127, '2018-12-17 06:45:17.000000', 'pending', 'riyad298@gmail.com'),
(128, '2018-12-17 06:45:44.000000', 'pending', 'riyad298@gmail.com'),
(129, '2018-12-17 06:46:09.000000', 'pending', 'riyad298@gmail.com'),
(130, '2018-12-17 06:55:13.000000', 'pending', 'riyad298@gmail.com'),
(131, '2018-12-17 06:57:15.000000', 'pending', 'riyad298@gmail.com'),
(132, '2018-12-17 06:57:17.000000', 'pending', 'riyad298@gmail.com'),
(133, '2018-12-17 06:57:25.000000', 'pending', 'riyad298@gmail.com'),
(134, '2018-12-17 06:57:39.000000', 'pending', 'riyad298@gmail.com'),
(135, '2018-12-17 06:59:11.000000', 'pending', 'riyad298@gmail.com'),
(136, '2018-12-17 06:59:15.000000', 'pending', 'riyad298@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `sellerId` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `total` int(5) NOT NULL,
  `sold` int(5) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `rating` int(2) NOT NULL,
  `discount` int(5) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sellerId`, `isbn`, `name`, `price`, `category`, `total`, `sold`, `description`, `image`, `date`, `rating`, `discount`, `status`) VALUES
(1, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(2, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(3, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(4, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(5, '', 'lkl', 'lklk', 3454, 'Garments', 345, 0, '345', '', '0000-00-00', 0, 0, ''),
(6, '', 'kkjoi', 'popo', 344, 'Garments', 345, 0, '345', '', '0000-00-00', 0, 0, ''),
(7, '', 'kkjoi', 'popo', 344, 'Garments', 345, 0, '345', '', '2018-12-16', 0, 0, ''),
(8, '', 'reter', 'rete', 454, 'grocery', 435, 0, 'rert', '', '2018-12-16', 0, 0, ''),
(9, '', 'reter', 'rete', 454, 'grocery', 435, 0, 'rert', '', '2018-12-16', 0, 0, ''),
(10, '', 'gug', 'uyygyu', 878, 'Mobbbile', 19878, 0, 'khjkjh', '', '2018-12-16', 0, 0, ''),
(11, '', 'gug', 'uyygyu', 878, 'Mobbbile', 19878, 0, 'khjkjh', '', '2018-12-16', 0, 0, ''),
(12, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(13, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(14, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(15, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(16, '', 'riyad', 'qeqw', 2000, 'Garments', 500, 0, 'cvb', '', '2018-12-16', 0, 0, ''),
(17, '', 'dfgdfdfg', 'dfgd', 35345, 'Garments', 345, 0, 'cvb', '', '2018-12-16', 0, 0, ''),
(18, '', 'khjh', 'khkj', 7765, 'Garments', 8767, 0, 'jhghj', '', '2018-12-16', 0, 0, ''),
(19, '', 'gfhfgh', 'fghfgh', 46546, 'Electronics', 456, 0, '456', '', '2018-12-16', 0, 0, ''),
(20, '', 'gfhfgh', 'fghfgh', 46546, 'Electronics', 456, 0, '456', '', '2018-12-16', 0, 0, ''),
(21, '', '64', 'ytyut', 56757, 'Electronics', 5354, 0, 'hgfgh', '', '2018-12-16', 0, 0, ''),
(22, 'riyad123@gmail.com', 'khhbh', 'kjhkjh', 9080, 'Electronics', 87987, 0, 'khih', '', '2018-12-16', 0, 0, ''),
(23, 'riyad123@gmail.com', 'khhbh', 'kjhkjh', 9080, 'Electronics', 87987, 0, 'khih', '', '2018-12-16', 0, 0, ''),
(24, 'riyad123@gmail.com', 'hgkhk', 'rtttt', 5000, 'Mobbbile', 300, 0, 'uyyuu', '', '2018-12-16', 0, 0, ''),
(25, 'riyad123@gmail.com', 'klijnj', 'grtrrt', 600, 'grocery', 400, 0, 'hghfg', '', '2018-12-16', 0, 0, ''),
(26, 'riyad123@gmail.com', 'Muhammad Ahsan Ferdous Riyad', 'Muhammad Ahsan Ferdous Riyad', 3, 'Electronics', 3, 0, 'kkr', '', '2018-12-17', 0, 0, ''),
(27, 'riyad123@gmail.com', 'Muhammad Ahsan Ferdous Riyad', 'Muhammad Ahsan Ferdous Riyad', 3, 'Electronics', 3, 0, 'kkr', '', '2018-12-17', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `mobile`, `dob`, `gender`, `password`, `type`) VALUES
(145, 'Riyad', 'Ahsan', 'riyad298@gmail.com', '01919448788', '2007-03-02', 'Male', '123456', 'User'),
(200, 'afrfa', 'arfarfa', 'riyad2981@gmail.com', '01919448787', '2005-02-03', 'Female', '123', 'User'),
(201, 'hello', 'Ahsan', 'riyad@gmail.com', '01919448787', '2005-03-03', 'Male', '123456', 'User'),
(202, 'Abdul', 'Kaium', 'makaium33@gmail.com', '01867075362', '2003-02-02', 'Male', '123456', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contains`
--
ALTER TABLE `contains`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=917;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `orderId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
