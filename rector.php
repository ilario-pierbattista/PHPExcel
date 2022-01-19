<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Php53\Rector\FuncCall\DirNameFileConstantToDirConstantRector;
use Rector\Php53\Rector\Ternary\TernaryToElvisRector;
use Rector\Php55\Rector\Class_\ClassConstantToSelfClassRector;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\Php56\Rector\FuncCall\PowToExpRector;
use Rector\Php56\Rector\FunctionLike\AddDefaultValueForUndefinedVariableRector;
use Rector\Php70\Rector\Assign\ListSplitStringRector;
use Rector\Php70\Rector\FuncCall\RandomFunctionRector;
use Rector\Php70\Rector\If_\IfToSpaceshipRector;
use Rector\Php70\Rector\MethodCall\ThisCallOnStaticMethodToStaticCallRector;
use Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector;
use Rector\Php71\Rector\ClassConst\PublicConstantVisibilityRector;
use Rector\Php71\Rector\FuncCall\CountOnNullRector;
use Rector\Php71\Rector\FuncCall\RemoveExtraParametersRector;
use Rector\Php71\Rector\List_\ListToArrayDestructRector;
use Rector\Php71\Rector\TryCatch\MultiExceptionCatchRector;
use Rector\Php72\Rector\FuncCall\GetClassOnNullRector;
use Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php74\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector;
use Rector\Php74\Rector\LNumber\AddLiteralSeparatorToNumberRector;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\LevelSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/Classes',
        __DIR__ . '/unitTests',
    ]);

    // Define what rule sets will be applied
    $containerConfigurator->import(LevelSetList::UP_TO_PHP_74);

    $parameters->set(Option::SKIP, [
        __DIR__. '/Classes/PHPExcel/Writer/PDF/DomPDF.php',
        __DIR__. '/Classes/PHPExcel/Writer/PDF/mPDF.php',
        __DIR__. '/Classes/PHPExcel/Writer/PDF/tcPDF.php',
        __DIR__. '/Classes/PHPExcel/Chart/Renderer/jpgraph.php',
        TypedPropertyRector::class,
        ClosureToArrowFunctionRector::class,
        PublicConstantVisibilityRector::class,
        ClassConstantToSelfClassRector::class,
        StringClassNameToClassConstantRector::class,
        TernaryToElvisRector::class,
        JsonThrowOnErrorRector::class,
        CountOnNullRector::class,
        TernaryToNullCoalescingRector::class,
        ThisCallOnStaticMethodToStaticCallRector::class,
        ListToArrayDestructRector::class,
        AddDefaultValueForUndefinedVariableRector::class,
        NullCoalescingOperatorRector::class,
        ListSplitStringRector::class,
        RandomFunctionRector::class,
        RemoveExtraParametersRector::class,
        AddLiteralSeparatorToNumberRector::class,
        MultiExceptionCatchRector::class,
        GetClassOnNullRector::class,
        ArraySpreadInsteadOfArrayMergeRector::class,
        IfToSpaceshipRector::class,
        PowToExpRector::class,
        DirNameFileConstantToDirConstantRector::class
    ]);

    // get services (needed for register a single rule)
    // $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);
};
