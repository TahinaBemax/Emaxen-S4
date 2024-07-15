@echo off
setlocal enabledelayedexpansion

::chemin vers la destination du deployement
set "destination=C:\xampp\htdocs\garage\";

if exist "%destination%" (
    rd /s /q "%destination%"
)

xcopy /s /e "." "%destination%"