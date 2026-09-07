<?php

namespace App\Filament\Widgets;

use App\Models\QuestionOption;
use App\Models\UserPoll;
use Filament\Widgets\ChartWidget;

class UserPolls extends ChartWidget
{
    protected ?string $heading = 'پاسخ های کاربران';
    protected int|string|array $columnSpan = 'full';
    protected function getQuestionColor(int $questionId): string
    {
        $colors = [
            '#6366F1',
            '#10B981',
            '#F59E0B',
            '#EF4444',
            '#8B5CF6',
            '#06B6D4',
            '#EC4899',
            '#84CC16',
        ];

        return $colors[($questionId - 1) % count($colors)];
    }
    protected function getData(): array
    {

        $data = UserPoll::query()
            ->selectRaw('question_option_id, COUNT(*) as votes')
            ->groupBy('question_option_id')
            ->with(['option.question'])
            ->get()
            ->sortBy(fn ($item) => $item->option->question->id)
            ->values();

        $questions = $data
            ->groupBy(fn ($item) => $item->option->question->id);

        $datasets = [];

        foreach ($questions as $questionId => $options) {
            $question = $options->first()->option->question;

            $color = $this->getQuestionColor($questionId);

            $datasets[] = [
                'label' => $question->question,
                'data' => $data->map(function ($item) use ($options) {
                    return $options->contains('question_option_id', $item->question_option_id)
                        ? $item->votes
                        : 0;
                })->toArray(),
                'backgroundColor' => $color,
                'borderColor' => $color,
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $data->map(
                fn ($item) => $item->option->option
            )->toArray(),
        ];
    }
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'ticks' => [
                        'precision' => 0,
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'bar';
    }
}
