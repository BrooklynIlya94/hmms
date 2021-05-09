-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 06 2021 г., 17:24
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hmmsdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(14) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Калошин Илья', 'admin', 9957772270, 'ilya1994kaloshin@gmail.com', '27fef2a4b8963cd14223d4871af637db', '2020-05-25 12:16:24');

-- --------------------------------------------------------

--
-- Структура таблицы `tblbp`
--

CREATE TABLE `tblbp` (
  `ID` int(10) NOT NULL,
  `MemberID` int(5) DEFAULT NULL,
  `SYS` int(5) DEFAULT NULL,
  `DIA` int(10) DEFAULT NULL,
  `Pulses` int(10) DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tblbp`
--

INSERT INTO `tblbp` (`ID`, `MemberID`, `SYS`, `DIA`, `Pulses`, `EnterDate`) VALUES
(11, 30, 120, 60, 80, '2021-05-06 10:18:22'),
(12, 32, 120, 60, 80, '2021-05-06 11:01:58');

-- --------------------------------------------------------

--
-- Структура таблицы `tblmember`
--

CREATE TABLE `tblmember` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Age` int(5) DEFAULT NULL,
  `Weight` varchar(50) DEFAULT NULL,
  `Relation` varchar(45) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tblmember`
--

INSERT INTO `tblmember` (`ID`, `UserID`, `FullName`, `Gender`, `Age`, `Weight`, `Relation`, `CreationDate`) VALUES
(31, 23, 'Шанель', 'Женский', 1, '3', 'Дочь', '2021-05-06 11:01:15'),
(32, 23, 'Уник', 'Мужской', 2, '4', 'Сын', '2021-05-06 11:01:42'),
(33, 23, 'Уникум', 'Мужской', 2, '4', 'Супруг', '2021-05-06 11:46:27');

-- --------------------------------------------------------

--
-- Структура таблицы `tblrange`
--

CREATE TABLE `tblrange` (
  `ID` int(10) NOT NULL,
  `TestName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tblrange`
--

INSERT INTO `tblrange` (`ID`, `TestName`, `Description`, `CreationDate`) VALUES
(1, 'Артериальное давление', '<b><font color=\"#00cccc\">Верхнее/Нижнее</font></b><div><ul><li>&nbsp;90/60 or less- <b><font color=\"#ff0000\">Низкое АД</font></b></li><li>&nbsp;&gt;90/60 и &lt;120/80- <b><font color=\"#33cc00\">Нормальное АД</font></b></li><li>&nbsp;&gt;120/80 и &lt;140/90- <b><font color=\"#ff9900\">Немного высокое АД</font></b></li><li>&nbsp;140/90&gt;- <b><font color=\"#ff0000\">Высокое АД</font></b></li></ul></div><div><div><br></div></div>', '2020-05-28 05:33:49'),
(2, 'Уровень сахара', '<font color=\"#00cc99\"><b>Уровень сахара натощак</b>&nbsp;</font><div><ul><li>&nbsp;70-100 mg/dl- <b style=\"\"><font color=\"#33cc00\">Нормальный</font></b></li><li>&nbsp;101-125 mg/dl - <font color=\"#ff9900\"><b>Преддиабетный</b></font></li><li>&nbsp;125 mg/dl и выше - <font color=\"#ff3300\"><b>Диабет</b>&nbsp;</font></li></ul><div><b><font color=\"#00cc99\">&nbsp;Уровень сахара после приема пищи&nbsp;</font></b></div><div><ul><li>70-140 mg/dl - <font color=\"#33cc00\"><b>Нормальный</b>&nbsp;</font></li><li>141-200 mg/dl -<b> <font color=\"#ff9900\">Преддиабетный</font>&nbsp;</b></li><li>200 mg/dl и выше - <b><font color=\"#ff3300\">Diabetes</font></b></li></ul></div></div>', '2020-05-28 05:47:23'),
(3, 'Температура тела', '<b>Температура тела&nbsp;</b><div>&nbsp;36.6-37 °C -<font color=\"#339900\"> <b>Нормальная температура</b>&nbsp;</font></div><div>&nbsp;&gt; 37.1°C -<b><font color=\"#ff0000\">Высокая температура</font></b></div>', '2020-05-28 05:50:43');

-- --------------------------------------------------------

--
-- Структура таблицы `tblsugar`
--

CREATE TABLE `tblsugar` (
  `ID` int(10) NOT NULL,
  `MemberID` int(5) DEFAULT NULL,
  `Typeoftest` varchar(50) DEFAULT NULL,
  `BloodSugar` float DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tblsugar`
--

INSERT INTO `tblsugar` (`ID`, `MemberID`, `Typeoftest`, `BloodSugar`, `EnterDate`) VALUES
(6, 30, 'FBS', 0.2, '2021-05-06 10:20:15'),
(7, 32, 'PPBS', 0.2, '2021-05-06 11:04:05');

-- --------------------------------------------------------

--
-- Структура таблицы `tbltemp`
--

CREATE TABLE `tbltemp` (
  `ID` int(10) NOT NULL,
  `MemberID` int(5) DEFAULT NULL,
  `BodyTemparture` double DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tbltemp`
--

INSERT INTO `tbltemp` (`ID`, `MemberID`, `BodyTemparture`, `EnterDate`) VALUES
(11, 30, 38, '2021-05-06 10:20:39');

-- --------------------------------------------------------

--
-- Структура таблицы `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(30) DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(23, 'Kaloshin Ilia', '79957772270', 'ilya@gmail.com', '273d335a3542d5fa5a483a2a17eb233b', '2021-05-06 09:57:27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `tblbp`
--
ALTER TABLE `tblbp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Индексы таблицы `tblmember`
--
ALTER TABLE `tblmember`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Индексы таблицы `tblrange`
--
ALTER TABLE `tblrange`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `tblsugar`
--
ALTER TABLE `tblsugar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Индексы таблицы `tbltemp`
--
ALTER TABLE `tbltemp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Индексы таблицы `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tblbp`
--
ALTER TABLE `tblbp`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `tblmember`
--
ALTER TABLE `tblmember`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `tblrange`
--
ALTER TABLE `tblrange`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tblsugar`
--
ALTER TABLE `tblsugar`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `tbltemp`
--
ALTER TABLE `tbltemp`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
