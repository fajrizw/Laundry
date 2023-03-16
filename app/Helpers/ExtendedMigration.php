use Doctrine\DBAL\Types\{StringType, Type};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\{DB, Log};

/**
 * Class ExtendedMigration
 * Use it when the involved table(s) has enum type column(s)
 */
class ExtendedMigration extends Migration
{
    /**
     * ExtendedMigration constructor.
     * Handle Laravel Issue related with modifying tables with enum columns
     */
    public function __construct()
    {
        try {
            Type::hasType('enum') ?: Type::addType('enum', StringType::class);
            Type::hasType('timestamp') ?: Type::addType('timestamp', DateTimeType::class);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
        }
    }
}
